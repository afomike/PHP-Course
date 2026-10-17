<?php

// Loops in PHP are used to execute a block of code repeatedly as long as a specified condition is true. PHP supports several types of loops, including for, while, do-while, and foreach loops. Additionally, the break and continue statements can be used to control the flow of loops.
// While Loop is a control structure that allows you to execute a block of code repeatedly as long as a specified condition is true. The condition is checked before the code block is executed, so if the condition is false initially, the code block will not be executed at all.
$i = 0;
while ($i < 5) {
    echo "The value of i is: $i\n";
    $i++;
}
// Break Statement
for ($l = 0; $l < 10; $l++) {
    if ($l == 5) {
        break; // Exit the loop when l equals 5
    }
    echo "The value of l is: $l\n";
}
// infinite loop with break statement
$m = 0;
while (true) {
    if ($m == 3) {
        break; // Exit the loop when m equals 3
    }
    echo "The value of m is: $m\n";
    $m++;
}
// Continue Statement
for ($n = 0; $n < 10; $n++) {
    if ($n % 2 == 0) {
        continue; // Skip the rest of the loop when n is even
    }
    echo "The value of n is: $n\n";
}

// Do-While Loop is similar to the while loop, but it guarantees that the block of code will be executed at least once, even if the condition is false. The condition is checked after the code block has been executed.
$j = 0;
do {
    echo "The value of j is: $j\n";
    $j++;
} while ($j < 5);

// For Loop is a control structure that allows you to execute a block of code a specific number of times. It consists of three parts: initialization, condition, and increment/decrement. The loop continues to execute as long as the condition is true.
for ($k = 0; $k < 5; $k++) {
    echo "The value of k is: $k\n";
}
// for loop for iterating over a string
$string = "Hello";  
for ($p = 0; $p < strlen($string); $p++) {
    echo "The character at position $p is: $string[$p]\n";
}

// for loop for iterating over an array
$fruits = array("apple", "banana", "cherry");  
for ($i = 0; $i < count($fruits); $i++) {
    echo "The fruit is: $fruits[$i]\n";
}   
// for loop for iterating over an array avoiding the performance hit of calling count() on each iteration
$fruits = array("apple", "banana", "cherry");
$fruitCount = count($fruits);
for ($i = 0; $i < $fruitCount; $i++) {
    echo "The fruit is: $fruits[$i]\n";
}

// Foreach Loop is specifically designed for iterating over arrays and objects. It provides a simpler syntax and automatically handles the iteration process, making it more convenient for working with collections of data.
$colors = array("red", "green", "blue");
foreach ($colors as $color) {
    echo "The color is: $color\n";
}

// foreach loop for iterating over an associative array
$person = array("name" => "John", "age" => 30, "
city" => "New York");
foreach ($person as $key => $value) {
    echo "The $key is: $value\n";
}