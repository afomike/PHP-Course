<?php
echo "Hello, World!";
$_123name ="Afomike";
echo "Hello, " . $_123name . "!";
$x = 1;
$y = $x;
// Assighning variable by reference
// $y = &$x;
 
$x = 3;

echo $y;

$firstName = "Afomike";

echo "Hello, $firstName!";

// for better practice, use curly braces to avoid ambiguity
# echo "Hello, {$firstName}!";
/*
multiple line comment
*/


?>



<!DOCTYPE html>
<!-- enbeding php code in html -->
<html>
<head>
</head>
<body>
    <h1>Hello, <?php echo $firstName; ?>!</h1>
    <h1>
        <?="Hello World!"?>
    </h1>
    <h1>
        <?php 
        $x = 10;
        $y = 5;

        echo $x . ', ' . $y;
        echo '<p>' . $x . ', ' . $y . '</p>';
     ?>
    </h1>
    <p>Welcome to our website!</p> 
</body>
</html>