<?php

// Functions in PHP are blocks of code that can be reused multiple times throughout a program. Functions allow you to break down your code into smaller, more manageable pieces, making it easier to read and maintain. Functions can take input parameters and return output values, allowing you to create modular and reusable code.
// Function Declaration
function greet() {
    return "Hello, World!";
}

// Function Call
echo greet() . "\n";

// function hinting
function addNumbers(int $a, int $b): int {
    return $a + $b;
}

echo addNumbers(5, 10) . "\n";
