<?php

declare(strict_types=1);

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config.php';

session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function redirectToPage(): void
{
    header('Location: index.php');
    exit;
}

$errors = [];
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$flashMessage = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);

$formValues = [
    'description' => '',
    'category' => 'Food',
    'date' => date('Y-m-d'),
    'amount' => '',
];
$editingExpense = null;

try {
    if ($requestMethod === 'POST') {
        $submittedToken = getStringInput($_POST, 'csrf_token');

        if (!hash_equals($_SESSION['csrf_token'], $submittedToken)) {
            throw new InvalidArgumentException('Your form session expired. Reload the page and try again.');
        }

        $action = getStringInput($_POST, 'action');

        if ($action === 'delete') {
            $id = getStringInput($_POST, 'id');
            deleteExpense($id);
            $_SESSION['flash_message'] = 'Expense deleted.';
            redirectToPage();
        }

        if ($action !== 'create' && $action !== 'update') {
            throw new InvalidArgumentException('Choose a valid expense action.');
        }

        $formValues = [
            'description' => getStringInput($_POST, 'description'),
            'category' => getStringInput($_POST, 'category'),
            'date' => getStringInput($_POST, 'date'),
            'amount' => getStringInput($_POST, 'amount'),
        ];
        $expense = validateExpenseInput($formValues);
        $id = $action === 'update' ? getStringInput($_POST, 'id') : null;

        saveExpense($expense, $id);
        $_SESSION['flash_message'] = $action === 'update' ? 'Expense updated.' : 'Expense added.';
        redirectToPage();
    }

    $expenses = getExpenses();

    if (isset($_GET['edit'])) {
        $editingExpense = findExpense(getStringInput($_GET, 'edit'), $expenses);

        if ($editingExpense === null) {
            throw new InvalidArgumentException('That expense could not be found.');
        }

        $formValues = $editingExpense;
    }

    usort($expenses, static fn(array $left, array $right): int => strcmp($right['date'], $left['date']));
    $summary = summarizeExpenses($expenses);
} catch (InvalidArgumentException $exception) {
    $errors[] = $exception->getMessage();

    if ($requestMethod !== 'POST') {
        $expenses = getExpenses();
        usort($expenses, static fn(array $left, array $right): int => strcmp($right['date'], $left['date']));
        $summary = summarizeExpenses($expenses);
    } else {
        $expenses = getExpenses();
        usort($expenses, static fn(array $left, array $right): int => strcmp($right['date'], $left['date']));
        $summary = summarizeExpenses($expenses);
        $editingExpense = ($_POST['action'] ?? '') === 'update' && is_string($_POST['id'] ?? null)
            ? findExpense($_POST['id'], $expenses)
            : null;
    }
} catch (RuntimeException $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $errors[] = 'The expense data could not be loaded or saved. Check that the project storage folder is writable.';
    $expenses = [];
    $summary = summarizeExpenses($expenses);
}

require PUBLIC_PATH . 'transactions.php';
