<?php

// Operators are symbols that perform operations on variables and values. They can be categorized into different types, such as arithmetic, assignment, comparison, logical, and more.

// Arithmetic operators perform mathematical operations on numeric values.
$x = 10; // Assignment operator
$y = 5; // Assignment operator

var_dump($x + $y); // Outputs: int(15) - Arithmetic operator (addition)
var_dump($x - $y); // Outputs: int(5) - Arithmetic operator (subtraction)
var_dump($x * $y); // Outputs: int(50) - Arithmetic operator (  multiplication)     
var_dump($x / $y); // Outputs: float(2) - Arithmetic operator (division)

$m = '10'; // Assignment operator

var_dump(+$m); // Outputs: int(10) - Type operator (conversion to integer)



// Assignment operators are used to assign values to variables.
$s = 20; // Assignment operator
$s += 5; // Assignment operator (addition assignment)


// String operators are used to concatenate strings or perform string operations.

$str1 = "Hello, "; // Assignment operator
$str2 = "World!"; // Assignment operator    
$str3 = $str1 . $str2; // String operator (concatenation)

// Comparison operators are used to compare values and return a boolean result (true or false).
$r = 10; // Assignment operator
$b = 20; // Assignment operator

var_dump($r == $b); // Outputs: bool(false) - Comparison operator (equal to)
var_dump($r != $b); // Outputs: bool(true) - Comparison operator (not equal to)
var_dump($r < $b); // Outputs: bool(true) - Comparison operator (less than)
var_dump($r > $b); // Outputs: bool(false) - Comparison operator (greater than)
var_dump($r <= $b); // Outputs: bool(true) - Comparison operator (less than or equal to)
var_dump($r >= $b); // Outputs: bool(false) - Comparison operator (greater than or equal to)
$f ="10"; // Assignment operator
var_dump($r === $f); // Outputs: bool(false) - Comparison operator (identical)

var_dump(0 == "o"); // Outputs: bool(true) - Comparison operator (equal to) - type juggling

$t = "Hello World"; // Assignment operator
$d = strpos($t, "H"); // Assignment operator

$result = $d !== false ? "The letter 'H' is found at position: " . $d : "The letter 'H' is not found in the string.";

if ($d !== false) { // Comparison operator (not identical)
    echo "The letter 'H' is found at position: " . $d; // Outputs: The letter 'H' is found at position: 0
} else {
    echo "The letter 'H' is not found in the string.";
}

$k = NULL; // Assignment operator
$o = $k ?? "Default Value"; // Null coalescing operator
echo $o; // Outputs: Default Value - since $k is NULL, the null co

// Error control operators are used to suppress error messages that may occur during the execution of a script.
$file = "nonexistentfile.txt"; // Assignment operator
$content = @file_get_contents($file); // Error control operator (@) - suppresses error

// Increment/Decrement operators are used to increase or decrease the value of a variable by one.
$increment = 5; // Assignment operator
echo $increment++; // Increment operator
echo ++$increment; // Increment operator

$increment_Null = NULL; // Assignment operator
echo $increment_Null++; // Increment operator - NULL is treated as 0, so it
// becomes 1 after the increment
Echo ++$increment_Null; // Increment operator - NULL is treated as 0, so it becomes 1 after the increment


$decrement = 10; // Assignment operator
echo $decrement--; // Decrement operator    
echo --$decrement; // Decrement operator

$decrement_Null = NULL; // Assignment operator
echo $decrement_Null--; // Decrement operator - NULL is treated as 0,
// so it becomes -1 after the decrement
echo --$decrement_Null; // Decrement operator - NULL is treated as 0, so it becomes -1 after the decrement





// Logical operators are used to combine multiple conditions and return a boolean result based on the evaluation of those conditions.
$a = true; // Assignment operator
$b = false; // Assignment operator

var_dump($a && $b); // Outputs: bool(false) - Logical operator (AND)
var_dump($a || $b); // Outputs: bool(true) - Logical operator (OR

//

// Bitwise operators are used to perform bit-level operations on integer values.
$d = 6; 
$v = 3;

var_dump($d & $v);
var_dump($d ^ $v);

var_dump($d | $v);

var_dump($d >> $v);

var_dump($d << $v);


// Array operators are used to perform operations on arrays, such as union, equality, and identity.
$array = ['A', 'B', 'C'];

$array2 = ['E', 'O', 'F' ];


$array_Con = $array + $array2;
// Array dont overide 

print_r($array_Con);

// Execution operators are used to execute external programs or commands from within a PHP script.

// Type operators are used to check the type of a variable or value, such as checking if a variable is an array, object, or callable function.

// Nullsafe operator is used to handle null values in a safe manner, preventing errors when accessing properties or methods of null objects.

