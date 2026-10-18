<?php

// match expression in PHP is a control structure that allows you to execute different blocks of code based on the value of a variable. It is similar to the switch statement, but it uses a more concise syntax and can handle more complex conditions. The match expression evaluates the value of the variable and executes the corresponding case block. If no case matches, the default block is executed (if provided).
$color = "red";
$result = match ($color) {
    "red" => "The color is red.",
    "blue" => "The color is blue.",
    "green" => "The color is green.",
    default => "The color is not red, blue, or green.",
};
echo $result;