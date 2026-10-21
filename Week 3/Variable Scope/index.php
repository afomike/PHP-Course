<?php
// Variable scope refers to the accessibility and visibility of variables within different parts of a program. In PHP, variables can have different scopes, such as global scope, local scope, and static scope. Understanding variable scope is important for managing data and avoiding naming conflicts in your code.

$globalVar = "I am a global variable"; // Global Scope

function testScope() {
    $localVar = "I am a local variable"; // Local Scope
    echo $localVar . "\n"; // Output: I am a local variable
    echo $GLOBALS['globalVar'] . "\n"; // Accessing global variable using $GLOBALS superglobal
}

testScope();

function getValue() {
    $Value = someVeryExpensiveFunction(); // Local Scope
    
    return $Value;
}

function someVeryExpensiveFunction() {
    // Simulating an expensive operation
    sleep(2); // Delay for 2 seconds
    return "Expensive Value";
}

echo getValue() . "<br/>"; // Output: Expensive Value
echo getValue() . "<br/>"; // Output: Expensive Value (cached result, no delay)
echo getValue() . "<br/>"; // Output: Expensive Value (cached result, no delay)
// Static Scope
function counter() {
    static $count = 0; // Static variable retains its value between function calls
    $count++;
    return $count;
}


?>