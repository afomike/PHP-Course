<?php

// Array Data Type is a data type that allows you to store multiple values in a single variable. Arrays can be indexed, associative, or multi-dimensional.
//$programmingLanguages = array("PHP", "JavaScript", "Python", "Java"); // Indexed array
$programmingLanguages = ["PHP", "JavaScript", "Python", "Java"]; // Indexed array using shorthand syntax
// Accessing elements in an indexed array

echo $programmingLanguages[0]; // Outputs: PHP
echo $programmingLanguages[1]; // Outputs: JavaScript
echo $programmingLanguages[2]; // Outputs: Python
echo $programmingLanguages[3]; // Outputs: Java

var_dump(is_set($programmingLanguages[4])); // Outputs: bool(false) - since the index 4 does not exist

$programmingLanguages[4] = "C++"; // Adding a new element to the indexed array
var_dump($programmingLanguages); // Outputs the entire array with the new element

count($programmingLanguages); // Outputs: 5 - the number of elements in the array

$programmingLanguages[] = "Ruby"; // Adding a new element to the end of the array

echo '<pre>';
print_r($programmingLanguages); // Outputs the entire array in a readable format
echo '</pre>';

array_push($programmingLanguages, "Go", "Rust"); // Adding multiple elements to the end of the array

// Associative array is an array where each key is associated with a specific value. The keys can be strings or integers.

$developerSkills = [
    "PHP" => "Intermediate",
    "JavaScript" => "Advanced",
    "Python" => "Beginner",
    "Java" => "Intermediate"
];

echo '<pre>';
print_r($developerSkills); // Outputs the entire associative array in a readable format
echo '</pre>';  

// arrays with multiple data types
$multiDataArray = [
    "Name" => "John Doe",
    "Age" => 30,
    "IsDeveloper" => true,
    "Skills" => ["PHP", "JavaScript", "Python"]
];  

// multi-dimensional array is an array that contains one or more arrays as its elements. It allows you to create complex data structures.
$multiDimensionalArray = [
    "Developers" => [
        ["Name" => "John Doe", "Age" => 30, "Skills" => ["PHP", "JavaScript"]],
        ["Name" => "Jane Smith", "Age" => 25, "Skills" => ["Python", "Java"]],
        ["Name" => "Mike Johnson", "Age" => 35, "Skills" => ["C++", "Go"]]
    ]
]; 

// duplicate key overwriting in associative arrays
$duplicateKeyArray = [
    "PHP" => "Intermediate",
    "JavaScript" => "Advanced",
    "Python" => "Beginner",
    "Java" => "Intermediate",
    "PHP" => "Advanced" // This will overwrite the previous value for the key "PHP"
];

// removing elements from an array
unset($programmingLanguages[2]); // Removes the element at index 2 (Python)
arrray_pop($programmingLanguages); // Removes the last element from the array (Rust)
array_shift($programmingLanguages); // Removes the first element from the array (PHP)

// checking if a key exists in an associative array
if (array_key_exists("JavaScript", $developerSkills)) {
    echo "The key 'JavaScript' exists in the associative array.";
} else {
    echo "The key 'JavaScript' does not exist in the associative array.";
}

var_dump(array_key_exists("C++", $developerSkills)); // Outputs: bool(false) - since the key "C++" does not exist
var_dump(isset($developerSkills["Python"])); // Outputs: bool(true) - since the key "Python" exists and is not null
