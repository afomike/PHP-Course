<?php

declare(strict_types=1);

function calculateAge(
    string $dateOfBirth,
    string $timezone = 'Africa/Lagos'
): int {

    $zone = new DateTimeZone($timezone);

    $dob = new DateTimeImmutable($dateOfBirth, $zone);

    $today = new DateTimeImmutable('today', $zone);

    if ($dob > $today) {
        throw new InvalidArgumentException(
            "Date of birth cannot be in the future."
        );
    }

    return $dob->diff($today)->y;
}
