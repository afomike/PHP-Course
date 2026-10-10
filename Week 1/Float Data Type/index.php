<?php

/* Float Data Type */

$float_number = 13.5e-3; // 0.0135

// checking the maximum and minimum float values
echo PHP_FLOAT_MAX; // Outputs: 1.7976931348623E+308    
echo PHP_FLOAT_MIN; // Outputs: 2.2250738585072E-308

// using floor 
$floored_value = floor((0.7 + 0.1) * 10); // Outputs: 7

// using ceiling
$ceiled_value = ceil((0.7 + 0.1) * 10); // Outputs: 8   

// when NAN is generated
$nan_value = acos(8); // Outputs: NAN   

// casting integer to float
$integer_number = 5;
$float_number = (float)$integer_number;




var_dump($float_number); // Outputs: float(3.14)

echo $float_number; // Outputs: 3.14