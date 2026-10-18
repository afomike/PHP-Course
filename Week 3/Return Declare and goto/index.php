<?php

// Return, Declare, and Goto in PHP are control structures that allow you to control the flow of execution of a program. The return statement is used to return a value from a function, the declare statement is used to set execution directives for a block of code, and the goto statement is used to jump to a specific point in the code.
// Return Statement is used to return a value from a function. When a return statement is executed, the function stops executing and returns the specified value to the caller.
function sum(int $a, int $b) {
    $c = $a + $b;
    return $c;
}

$result = sum(5, 10);
echo "The sum is: $result\n";

// Declare Statement is used to set execution directives for a block of code. The declare statement can be used to set the strict_types directive, which enforces strict type checking for function arguments and return values.
// ticks directive
function onTick() {
    echo "Tick handler called.\n";
}
register_tick_function('onTick');

declare(ticks=1)

$a = 1;
$length = 10;

while ($a < $length) {
    echo "The value of a is: $a\n";
    $a++;
}

declare(ticks=1) {
    function tick_handler() {
        echo "Tick handler called.\n";
    }
    register_tick_function('tick_handler');
    $a = 1;
    $b = 2;
    $c = $a + $b;
}
echo "The value of c is: $c\n";

// Encoding directive
// declare(encoding='UTF-8') {
//     $string = "Hello, World!";
//     echo $string;
// }

// strict_types directive
// declare(strict_types=1);
// function add(int $a, int $b): int {
//     return $a + $b;
// }

// Goto Statement is used to jump to a specific point in the code. The goto statement can be used to create loops or to skip over certain parts of the code.
$counter = 0;
goto end;