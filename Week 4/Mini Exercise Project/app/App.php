<?php

declare(strict_types = 1);

function parseAmount(string $amount): float
{
    $normalizedAmount = str_replace(['$', ','], '', $amount);

    return (float) $normalizedAmount;
}

function getTransactions(): array
{
    $transactions = [];
    $files = glob(FILES_PATH . '*.csv');

    if ($files === false) {
        return $transactions;
    }

    sort($files, SORT_STRING);

    foreach ($files as $file) {
        $handle = fopen($file, 'r');

        if ($handle === false) {
            continue;
        }

        $header = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 4) {
                continue;
            }

            [$date, $checkNumber, $description, $amount] = $row;

            $transactions[] = [
                'date' => $date,
                'check_number' => $checkNumber,
                'description' => $description,
                'amount' => parseAmount($amount),
            ];
        }

        fclose($handle);
    }

    return $transactions;
}

function getTotalIncome(array $transactions): float
{
    $totalIncome = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction['amount'] > 0) {
            $totalIncome += $transaction['amount'];
        }
    }

    return $totalIncome;
}

function getTotalExpense(array $transactions): float
{
    $totalExpense = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction['amount'] < 0) {
            $totalExpense += abs($transaction['amount']);
        }
    }

    return $totalExpense;
}

function getNetTotal(array $transactions): float
{
    return getTotalIncome($transactions) - getTotalExpense($transactions);
}

function formatDate(string $date): string
{
    return date('M j, Y', strtotime($date));
}

function formatCurrency(float $amount): string
{
    $prefix = $amount < 0 ? '-' : '';
    $formattedAmount = number_format(abs($amount), 2);

    return $prefix . '$' . $formattedAmount;
}
