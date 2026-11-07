<?php

declare(strict_types=1);

function calculateTax(
    float $amount,
    float $taxRate = 7.5
): array {

    if ($amount < 0 || $taxRate < 0) {
        throw new InvalidArgumentException(
            "Amount and tax rate cannot be negative."
        );
    }

    $tax = ($amount * $taxRate) / 100;

    return [
        'amount' => $amount,
        'tax_rate' => $taxRate,
        'tax_amount' => $tax,
        'total' => $amount + $tax
    ];
}