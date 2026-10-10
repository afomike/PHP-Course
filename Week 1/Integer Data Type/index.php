<?php
/* Integer Data Type */

$x =5;
echo $x; // Outputs: 5

// hexadecimal number
$hexadecimal = 0x2A; // 42 in decimal
echo $hexadecimal; // Outputs: 42

// octal number
$octal = 012; // 10 in decimal
echo $octal; // Outputs: 10

// binary number
$binary = 0b1010; // 10 in decimal
echo $binary; // Outputs: 10

// when integer is too large, it will be interpreted as a float
$large_integer = 9223372036854775807; // Maximum value for a 64-bit signed integer
echo $large_integer; // Outputs: 9223372036854775807   

// casting to Float to integer
$float_number = 3.14;   
echo (int)$float_number; // Outputs: 3

// casting to String to integer
$string_number = "42";
echo (int)$string_number; // Outputs: 42

// using underscore to separate digits in an integer for better readability
$readable_integer = 1_000_000; // 1 million 
echo $readable_integer; // Outputs: 1000000

?>