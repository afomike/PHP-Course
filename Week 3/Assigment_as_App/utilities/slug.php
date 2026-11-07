<?php

declare(strict_types=1);

function generateSlug(string $text): string
{
    $text = strtolower(trim($text));

    $text = preg_replace('/[^a-z0-9]+/', '-', $text);

    return trim($text ?? '', '-');
}