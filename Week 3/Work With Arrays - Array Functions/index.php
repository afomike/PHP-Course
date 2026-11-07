<?php
//  built-in array functions in PHP are pre-defined functions that allow you to perform various operations on arrays. These functions provide a convenient way to manipulate and work with arrays, making it easier to perform common tasks such as sorting, filtering, and transforming data. Some of the most commonly used built-in array functions in PHP include:

require_once 'helper.php';
// array_chunk( array $array, int $length, bool $preserve_keys = false ): array

$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

prettyPrintArray( array_chunk($items, 2) ); // Output: [['a' => 1, 'b' => 2], ['c' => 3, 'd' => 4], ['e' => 5]]

// array_filter( array $array, ?callable $callback = null, int $mode = 0 ): array

$array = [1, 2, 3, 4, 5];

$even = array_filter($array, fn($number) => $number % 2 === 0);

prettyPrintArray($even); // Output: [2, 4]


// array_map( callable $callback, array $array, array ...$arrays ): array

$numbers = [1, 2, 3, 4, 5];
$squared = array_map(fn($n) => $n ** 2, $numbers);
prettyPrintArray($squared); // Output: [1, 4, 9, 16, 25]


$array1 = ['a' => 1, 'b' => 2, 'c' => 3];
$array2 = ['d' => 4, 'e' => 5, 'f' => 6];

$array3 = array_map(fn($x, $y) => $x + $y, $array1, $array2);
prettyPrintArray($array3); // Output: ['a' => 5, 'b' => 7, 'c' => 9]

// array_merge( array ...$arrays ): array

$array1 = ['a' => 1, 'b' => 2];
$array2 = ['c' => 3, 'd' => 4];
$array3 = ['e' => 5, 'f' => 6];

$merged = array_merge($array1, $array2, $array3);
prettyPrintArray($merged); // Output: ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6]


// array_reduce( array $array, callable $callback, mixed $initial = null ): mixed
$invoiceItems = [
[ 'price' => 10.00, 'quantity' => 2, 'description' => 'Item 1' ],
[ 'price' => 5.00, 'quantity' => 3, 'description' => 'Item 2' ],
[ 'price' => 20.00, 'quantity' => 1, 'description' => 'Item 3' ]
];
$total = array_reduce($invoiceItems, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
prettyPrintArray($total); // Output: 45.00


// array_search( mixed $needle, array $haystack, bool $strict = false ): int|string|false
$fruits = ['apple', 'banana', 'orange', 'grape'];
$searchResult = array_search('orange', $fruits);
if ($searchResult !== false) {
    echo "Found 'orange' at index: $searchResult\n"; // Output: Found 'orange' at index: 2
} else {
    echo "'orange' not found in the array.\n";
}

?>
