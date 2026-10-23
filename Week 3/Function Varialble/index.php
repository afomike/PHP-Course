<?php
/* Variable, Annonymous Function, and Closure in PHP */

function Sum(int|float ...$numbers): int|float {
    return array_sum($numbers);
}

echo Sum(1, 2, 3, 4, 5) . "<br/>"; // Output: 15
$x = 'Sum';

if (is_callable($x)) {
    echo $x(10, 20, 30) . "<br/>"; // Output: 60
} else {
    echo "Function $x is not callable.";
}

echo $x(10, 20, 30) . "<br/>"; // Output: 60

// anonymous function

$greet = function($name) {
    return "Hello, $name!";
};

echo $greet("John") . "<br/>"; // Output: Hello, John!

// annoymous function to access variable from outside its scope

$greeting = "Hello";

$greetWithClosure = function($name) use ($greeting) {
    return "$greeting, $name!";
};

echo $greetWithClosure("Alice") . "<br/>"; // Output: Hello, Alice!

// callable function with closure

array_map(function($number) {
    return $number * 2;
}, [1, 2, 3, 4, 5]); // Output: [2, 4, 6, 8, 10]    

// Arrow function (introduced in PHP 7.4)

$numbers = [1, 2, 3, 4, 5];

$doubled = array_map(fn($number) => $number * 2, $numbers);

each($doubled as $value) {
    echo $value . "<br/>"; // Output: 2, 4, 6, 8, 10
}




?>