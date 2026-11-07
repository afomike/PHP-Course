<?php

declare(strict_types=1);

function validateEmail(string $email): bool
{
    return filter_var(
        trim($email),
        FILTER_VALIDATE_EMAIL
    ) !== false;
}

var_dump(validateEmail("example@gmail.com"));
var_dump(validateEmail("invalid-email"));