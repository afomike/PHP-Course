<?php

declare(strict_types=1);

function escapeHtml(string|int|float|null $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function formatCurrency(float $amount): string
{
    return '₦' . number_format($amount, 2);
}

function formatExpenseDate(string $date): string
{
    $parsedDate = DateTimeImmutable::createFromFormat('!Y-m-d', $date);

    return $parsedDate === false ? $date : $parsedDate->format('M j, Y');
}
