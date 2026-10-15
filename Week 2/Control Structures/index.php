<?php

// Control Structures in PHP is a way to control the flow of execution of a program based on certain conditions. Control structures include conditional statements (if, else, elseif, switch) and loops (for, while, do-while, foreach).
// If-Else Statement
$age = 20;
if ($age >= 18) {
    echo "You are an adult.";
} else {
    echo "You are not an adult.";
}

// If-ElseIf-Else Statement
$grade = 85;
if ($grade >= 90) {
    echo "You got an A.";
} elseif ($grade >= 80) {
    echo "You got a B.";
} else {
    echo "You got a C or lower.";
}

// Switch Statement
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "It's Monday.";
        break;
    case "Tuesday":
        echo "It's Tuesday.";
        break;
    default:
        echo "It's some other day.";
}

?>