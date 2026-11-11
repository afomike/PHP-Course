<?php
// Error Handling in PHP

error_reporting(E_ALL & ~E_WARNING ); // This will suppress warnings and notices.

trigger_error('Example error', E_USER_ERROR); // This will trigger a user-generated error.')

echo 1;

function errorHandler(
    int $type,
    string $message,
    string $file = null,
    int $line = null

){
    echo $type . ' - ' . $message . ' in ' . $file . ' on line ' . $line;

    exit(1); // Exit the script after handling the error.
}

set_error_handler('errorHandler', E_ALL); // Set the custom error handler for all error types.);

?>

