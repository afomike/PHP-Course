<?php

// Null Data Type is a special data type that represents a variable with no value or an undefined state. It is often used to indicate the absence of a value or to reset a variable.

// Null constants can be assigned to variables to indicate that they have no value.
$variable1 = null; // Assigning null to a variable

echo $variable1; // Outputs: (nothing, as the variable is null)

var_dump($variable1); // Outputs: NULL

var_dump(is_null($variable1)); // Outputs: bool(true)

var_dump(isset($variable1)); // Outputs: bool(false) - since the variable is null, it is considered not set

var_dump($variable2 == null); // Outputs: bool(true) - comparing a variable to null

// unset() function can be used to destroy a variable and set it to null
$variable2 = "Hello, World!";

var_dump($variable2); // Outputs: string(13) "Hello, World!"

unset($variable2); // Destroying the variable
var_dump($variable2); // Outputs: NULL - the variable is now null after being unset

// casting null to other data types
$nullValue = null;
var_dump((int)$nullValue); // Outputs: int(0)
var_dump((float)$nullValue); // Outputs: float(0)
var_dump((string)$nullValue); // Outputs: string(0) ""
var_dump((bool)$nullValue); // Outputs: bool(false)

// use case of null
$defaultName = null;
