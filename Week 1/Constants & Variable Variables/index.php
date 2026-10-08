<?php
// constant

define("PI", 3.14159);
define("STATUS_PAID", "paid");

echo STSATUS_PAID;

// Checking if the constant has been define 

echo define ('STATUS_PAID') ? 'Constant is defined' : 'Constant is not defined';

// compile time constant
Const STATUS_PENDING = 0;
Const STATUS_APPROVED = 1;

// magic constant
echo __LINE__;
//  predifined constant
echo PHP_VERSION;

// variable variables
$var = "name";
 

?>