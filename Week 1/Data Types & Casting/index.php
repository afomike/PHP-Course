<?php
declare(strict_types=1);

// Data Types & Casting

// Data Types
$integer = 5;
$float = 3.14;
$string = "Hello, World!";
$boolean = true;

// compound data types
$array = array(1, 2, 3);
$object = new stdClass();
$callable = function() { echo "Hello from callable!"; };
$iterable = [1, 2, 3];

// special data types
$resource = fopen("file.txt", "r");
$null = null;

gettype($integer); // Outputs: integer
gettype($float); // Outputs: double 
gettype($string); // Outputs: string
gettype($boolean); // Outputs: boolean  

var_dump($array); // Outputs: array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) }
var_dump($object); // Outputs: object(stdClass)#1 (0) { }       


// Fucntion to sum two variables
function sum($a, $b) {
    var_dump($a,$b ); // Outputs: int(5)
    echo '<br>';
    return $a + $b;
}

echo sum(5, 10); // Outputs: 15


// Casting
$casted_integer = (int)$float;
$casted_float = (float)$integer;
$casted_string = (string)$integer;
$casted_boolean = (bool)$string;

echo $casted_integer;
echo $casted_float;
echo $casted_string;
echo $casted_boolean;

?>

