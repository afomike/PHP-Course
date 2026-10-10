<?php
/* Boolean Data Type */

$iscompleted = true;

echo $iscompleted; // Outputs: 1 (true)
var_dump($iscompleted); // Outputs: bool(true)
is_bool($iscompleted); // Outputs: true
var_dump(is_bool($iscompleted)); // Outputs: bool(true)

if ($iscompleted) {
    // do something if the task is completed
    echo "The task is completed.";
} else {
    // do something else if the task is not completed
    echo "The task is not completed.";
}



?>