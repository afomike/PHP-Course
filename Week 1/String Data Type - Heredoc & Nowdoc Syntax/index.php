<?php

// String Data Type - Heredoc & Nowdoc Syntax

// when using double quotes, variables are parsed and their values are inserted into the string
$name = "John";


// when using single quotes, variables are not parsed and their names are treated as literal strings
$greeting = 'Hello, $name!'; // Outputs: Hello, $name!

// accessing indexes of a string
$first_character = $name[0]; // Outputs: J

// Changing a character in a string
$name[0] = 'M'; // Changes the first character to 'M'

// accessing a character by index using curly braces
// $second_character = $name{1}; // Outputs: o

// Heredoc syntax allows for multi-line strings and variable parsing
$heredoc_string = <<<EOD

This is a heredoc string.
It can span multiple lines and parse variables like $name.
EOD;

// Nowdoc syntax is similar to heredoc but does not parse variables
$nowdoc_string = <<<'EOD'
This is a nowdoc string.
It can also span multiple lines but does not parse variables like $name.
EOD;



