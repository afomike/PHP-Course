<?php

// Functions in PHP are blocks of code that can be reused multiple times throughout a program. Functions allow you to break down your code into smaller, more manageable pieces, making it easier to read and maintain. Functions can take input parameters and return output values, allowing you to create modular and reusable code.
// Function Declaration
function greet() {
    return "Hello, World!";
}

// Function Call
echo greet() . "\n";

// Function with Parameters
function add($a, $b) {
    return $a + $b;
}   

// Function Call with Parameters
$result = add(5, 10);
echo "The sum is: $result\n";

