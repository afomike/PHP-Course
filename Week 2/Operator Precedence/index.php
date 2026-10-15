<?php

// Operator precedence determines the order in which operators are evaluated in an expression. Operators with higher precedence are evaluated before operators with lower precedence. When operators have the same precedence, their associativity determines the order of evaluation (left-to-right or right-to-left).
$Var1 = 5 + 3 * 5 ; // Assignment operator
echo $Var1; // Outputs: 20 - Multiplication is performed first, then addition

// Forcing precedence using parentheses
$Var2 = (5 + 3) * 5; // Assignment operator
echo $Var2; // Outputs: 40 - Parentheses force addition to be performed first, then multiplication

// Associativity determines the order in which operators of the same precedence are evaluated. Most operators have left-to-right associativity, meaning they are evaluated from left to right. However, some operators, such as the assignment operator (=), have right-to-left associativity, meaning they are evaluated from right to left.
$Var3 = 10 / 5 * 2; // Assignment operator
echo $Var3; // Outputs: 4   

$var4 = 10 / (5 * 2); // Assignment operator
echo $var4; // Outputs: 1 - Parentheses force multiplication to be performed first

$var5 = true;
$var6 = false;


var_dump($var5 && $var6); // Outputs: bool(false) - Logical AND operator (&&) has higher precedence than Logical OR operator (||)
var_dump($var5 || $var6); // Outputs: bool(true) - Logical OR

