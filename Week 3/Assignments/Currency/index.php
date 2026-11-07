<?php

declare(strict_types=1);

function formatCurrency(
    float $amount,
    string $currency = 'NGN'
): string {

    $symbol = match ($currency) {
        'NGN' => '₦',
        'USD' => '$',
        'GBP' => '£',
        'EUR' => '€',
        default => $currency . ' '
    };

    return $symbol . number_format($amount, 2);
}


echo formatCurrency(150000);
echo formatCurrency(250, 'USD');