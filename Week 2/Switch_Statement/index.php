<?php
// Switch Statement in PHP is a control structure that allows you to execute different blocks of code based on the value of a variable. It is an alternative to using multiple if-else statements when you have a variable that can take on multiple values. The switch statement evaluates the value of the variable and executes the corresponding case block. If no case matches, the default block is executed (if provided).
$color = "red";
switch ($color) {
    case "red":
        echo "The color is red.";
        break;
    case "blue":
        echo "The color is blue.";
        break;
    case "green":
        echo "The color is green.";
        break;
    default:
        echo "The color is not red, blue, or green.";
}

// Switch Statement with multiple cases
$fruit = "banana";  
switch ($fruit) {
    case "apple":
    case "banana":
    case "cherry":
        echo "The fruit is either an apple, banana, or cherry.";
        break;
    default:
        echo "The fruit is not an apple, banana, or cherry.";
}

// Switch Statement with fall-through behavior
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "It's Monday.";
        // No break statement here, so it will fall through to the next case
    case "Tuesday":
        echo "It's Tuesday.";
        break;
    default:
        echo "It's some other day.";
}
// difference between if-else and switch statement is that switch statement is more efficient when you have a variable that can take on multiple values, while if-else statements are more flexible and can handle complex conditions. Switch statements are also easier to read and maintain when you have a large number of cases to evaluate. However, switch statements only work with scalar values (integers, strings, etc.) and cannot handle complex conditions or expressions like if-else statements can.
function x() {
    sleep(1);
    echo "Function x executed.\n";
    return 1;
}

if (x() == 1) {
    echo 1;
} elseif (x() == 2) {
    echo 2;
} elseif (x() == 3) {
    echo 3;
} else {
    echo "No match.";
}

// Switch statement with function calls
switch (x()) {
    case 1:
        echo 1;
        break;
    case 2:
        echo 2;
        break;
    case 3:
        echo 3;
        break;
    default:
        echo "No match.";
}