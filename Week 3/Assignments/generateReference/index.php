<?php

declare(strict_types=1);

function generateReference(string $prefix = 'REF'): string
{
    return $prefix . '-' .
        date('YmdHis') . '-' .
        strtoupper(bin2hex(random_bytes(4)));
}

echo generateReference('PAY');