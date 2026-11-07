<?php

declare(strict_types=1);

// 1. Named Arguments
function introduce(string $name, string $course): string
{
    return "My name is $name and I study $course.";
}

echo introduce(
    course: "Computer Science",
    name: "Michael"
);


// 2. Variadic Functions
function calculateTotal(float ...$numbers): float
{
    return array_sum($numbers);
}

echo calculateTotal(100, 200, 300);


// 3. Argument Unpacking
$numbers = [100, 200, 300];

echo calculateTotal(...$numbers);


// 4. Variable Scope
$school = "Federal University Lokoja";

function displaySchool(): string
{
    global $school;

    return $school;
}

echo displaySchool();


// 5. Static Variables
function visitCounter(): int
{
    static $count = 0;

    return ++$count;
}

echo visitCounter(); // 1
echo visitCounter(); // 2
echo visitCounter(); // 3


// 6. Anonymous Function
$multiply = function (int $a, int $b): int {
    return $a * $b;
};

echo $multiply(5, 4);


// 7. Arrow Function
$square = fn(int $number): int => $number ** 2;

echo $square(5);


// 8. Callable Function
function greet(string $name): string
{
    return "Welcome, " . $name;
}

$callback = 'greet';

echo $callback("Michael");


// 9. Closure
$taxRate = 7.5;

$taxCalculator = function (float $amount) use ($taxRate): float {
    return ($amount * $taxRate) / 100;
};

echo $taxCalculator(100000);


// 10. Array Functions
$numbers = [10, 20, 30, 40, 50];

$filtered = array_filter(
    $numbers,
    fn($number) => $number > 20
);

print_r($filtered);


// 11. Tickable Statements
declare(ticks=1);

function tickHandler(): void
{
    // Demonstration of a tick callback.
}

register_tick_function('tickHandler');

$n = 1 + 2;

unregister_tick_function('tickHandler');

?>