<?php
declare(strict_types=1);
// functions with parameters are functions that accept input values, known as arguments, which can be used within the function to perform operations or calculations. Parameters allow functions to be more flexible and reusable, as they can work with different input values each time they are called.
// Function Declaration with Parameters
function multiply($x, $y) {
    return $x * $y;
}

// Function Call with Arguments
echo multiply(4, 5) . "\n"; // Output: 20

// using strict typing and type hinting for parameters


function foo(int|float $num1, int|float $num2): float {
    return $num1 * $num2;
}

// Function Call with Arguments
echo foo(3.5, 2) . "\n"; // Output: 7

// Function with Default Parameter Value
function greetUser($name = "Guest") {
    return "Hello, $name!";
}

// Function Call with Argument
echo greetUser("Alice") . "\n"; // Output: Hello, Alice!
// Function Call without Argument (uses default value)  
echo greetUser() . "\n"; // Output: Hello, Guest!

// funtion pass by reference
function increment(&$value) {
    $value++;
}   

// Variable Declaration
$number = 10;

// Function Call with Argument Passed by Reference
increment($number);
// Output the incremented value     
echo $number . "\n"; // Output: 11
// Function with Multiple Parameters Passed by Reference
function foo2(int|float &$x, int|float &$y): int|float {
    if ($x % 2 ===0){
        $x += 10;
    }
    return $x * $y;
}
// Variable Declaration
$a = 4;
$b = 5;
// Function Call with Arguments Passed by Reference
echo foo2($a, $b) . "\n"; // Output: 40

// using spread operator to accept variable number of arguments
function foo3(int|float ...$numbers): int|float {
    return array_sum($numbers);
}

// Function Call with Variable Number of Arguments
echo foo3(1, 2, 3, 4, 5) . "\n"; // Output: 15  

// spread operator can also be used to unpack an array into individual arguments when calling a functions
$myNumbers = [1, 2, 3, 4, 5];
echo foo3(...$myNumbers) . "\n"; // Output: 15