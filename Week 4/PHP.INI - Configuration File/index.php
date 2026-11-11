<?php

/*
 * PHP.INI - Configuration File
 * 
 * This file is used to configure various settings for PHP.
 * It allows you to customize the behavior of PHP according to your needs.
 * 
 * You can modify settings such as error reporting, memory limits, and more.
 * 
 * Please refer to the PHP documentation for a complete list of available directives.
 */

// error_reporting, error_log, display_errors, and other settings can be configured here.

var_dump(ini_get('error_reporting'));
ini_set('error_reporting', E_ALL);

ini_set('error_reporting', E_ALL & ~E_WARNING & ~E_NOTICE); // This will suppress warnings and notices.
$array = [1];

echo $array[3]; // This will trigger a notice since index 3 does not exist in the array.

// display_errors can be set to 'On' or 'Off' to control whether errors are displayed to the user.

var_dump(ini_get('display_errors'));
ini_set('display_errors', 'Off');






?>