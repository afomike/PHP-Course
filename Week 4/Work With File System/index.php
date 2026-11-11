<?php
// Working with the File System in PHP

$dir = scandir(__DIR__); // Get the list of files and directories in the current directory.


var_dump($dir); // Output the list of files and directories.

// make a new directory
//mkdir('mike');

//rmdir('mike'); // Remove the directory named 'mike'.

if (file_exists('mike')) {
    echo "Directory 'mike' exists.";
} else {
    echo "Directory 'mike' does not exist.";
}

?>


