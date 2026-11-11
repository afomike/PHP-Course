<?php

declare(strict_types=1);

const EXPENSE_CATEGORIES = [
    'Food',
    'Transport',
    'Housing',
    'Utilities',
    'Health',
    'Entertainment',
    'Shopping',
    'Other',
];

function readExpenseData(): array
{
    $contents = file_get_contents(EXPENSES_FILE);

    if ($contents === false) {
        throw new RuntimeException('Unable to read the expense storage file.');
    }

    $expenses = json_decode($contents, true);

    if (!is_array($expenses)) {
        throw new RuntimeException('The expense storage file contains invalid JSON.');
    }

    return $expenses;
}

function withExpenseLock(int $lockType, callable $callback): mixed
{
    $lock = fopen(EXPENSES_LOCK_FILE, 'c');

    if ($lock === false) {
        throw new RuntimeException('Unable to open the expense storage lock.');
    }

    try {
        if (!flock($lock, $lockType)) {
            throw new RuntimeException('Unable to lock the expense storage file.');
        }

        return $callback();
    } finally {
        flock($lock, LOCK_UN);
        fclose($lock);
    }
}

function getExpenses(): array
{
    return withExpenseLock(LOCK_SH, 'readExpenseData');
}

function changeExpenses(callable $change): mixed
{
    return withExpenseLock(LOCK_EX, function () use ($change): mixed {
        $expenses = readExpenseData();
        $result = $change($expenses);
        $json = json_encode(array_values($expenses), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        if ($json === false || file_put_contents(EXPENSES_FILE, $json . PHP_EOL, LOCK_EX) === false) {
            throw new RuntimeException('Unable to save the expense data.');
        }

        return $result;
    });
}

function saveExpense(array $expense, ?string $id = null): void
{
    changeExpenses(function (array &$expenses) use ($expense, $id): void {
        if ($id === null) {
            $expense['id'] = bin2hex(random_bytes(8));
            $expenses[] = $expense;

            return;
        }

        foreach ($expenses as $index => $existingExpense) {
            if (($existingExpense['id'] ?? null) === $id) {
                $expense['id'] = $id;
                $expenses[$index] = $expense;

                return;
            }
        }

        throw new InvalidArgumentException('That expense could not be found.');
    });
}

function deleteExpense(string $id): void
{
    changeExpenses(function (array &$expenses) use ($id): void {
        foreach ($expenses as $index => $expense) {
            if (($expense['id'] ?? null) === $id) {
                unset($expenses[$index]);

                return;
            }
        }

        throw new InvalidArgumentException('That expense could not be found.');
    });
}

function findExpense(string $id, array $expenses): ?array
{
    foreach ($expenses as $expense) {
        if (($expense['id'] ?? null) === $id) {
            return $expense;
        }
    }

    return null;
}

function summarizeExpenses(array $expenses): array
{
    $summary = [
        'total' => 0.0,
        'count' => count($expenses),
        'byCategory' => array_fill_keys(EXPENSE_CATEGORIES, 0.0),
    ];

    foreach ($expenses as $expense) {
        $amount = (float) $expense['amount'];
        $category = $expense['category'];
        $summary['total'] += $amount;
        $summary['byCategory'][$category] += $amount;
    }

    return $summary;
}

function validateExpenseInput(array $input): array
{
    $description = trim(getStringInput($input, 'description'));
    $category = getStringInput($input, 'category');
    $date = getStringInput($input, 'date');
    $amountInput = trim(getStringInput($input, 'amount'));
    $amount = filter_var($amountInput, FILTER_VALIDATE_FLOAT);

    if ($description === '' || strlen($description) > 120) {
        throw new InvalidArgumentException('Description is required and must be 120 characters or fewer.');
    }

    if (!in_array($category, EXPENSE_CATEGORIES, true)) {
        throw new InvalidArgumentException('Choose a valid expense category.');
    }

    $parsedDate = DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    if ($parsedDate === false || $parsedDate->format('Y-m-d') !== $date) {
        throw new InvalidArgumentException('Enter a valid expense date.');
    }

    if ($amount === false || !is_finite((float) $amount) || $amount <= 0 || $amount > 1000000000) {
        throw new InvalidArgumentException('Amount must be greater than zero and no more than 1,000,000,000.');
    }

    return [
        'description' => $description,
        'category' => $category,
        'date' => $date,
        'amount' => round((float) $amount, 2),
    ];
}

function getStringInput(array $input, string $key): string
{
    $value = $input[$key] ?? '';

    if (!is_string($value) && !is_numeric($value)) {
        throw new InvalidArgumentException('Invalid value provided for ' . $key . '.');
    }

    return (string) $value;
}
