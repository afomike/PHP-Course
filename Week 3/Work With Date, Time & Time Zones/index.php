<?php
// Date and Time in PHP are represented using the DateTime class, which provides a flexible way to work with dates and times. The DateTime class allows you to create, manipulate, and format date and time values in various ways. It also supports time zones, making it easier to work with dates and times across different regions.


$currentTime = time(); // Get the current Unix timestamp

echo $currentTime . "<br/>"; // Output: Current Unix timestamp

echo $currentTime + 5 + 24 * 60 * 60 . "<br/>"; // Output: Current Unix timestamp + 5 days  

echo $currentTime - 60 * 60 * 24 . "<br/>"; // Output: Current Unix timestamp - 1 day

echo date('m/d/Y g:i A', $currentTime) . "<br/>"; // Output: Current date and time in the specified format  

echo date('Y-m-d H:i:s', $currentTime) . "<br/>"; // Output: Current date and time in the specified format

echo date('m/d/Y g:ia', mktime(0, 0, 0, 4, 10, null)) . "<br/>";

echo strtotime('2023-04-10 00:00:00') . "<br/>"; // Output: Unix timestamp for the specified date and time

echo date('m/d/Y g:ia', strtotime('first day of this month')) . "<br/>"; // Output: Formatted date and time for the specified date and time

?>
