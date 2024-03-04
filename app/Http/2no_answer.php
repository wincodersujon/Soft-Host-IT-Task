
// 2 no answer.
<?php

$arr = [
    ['name' => 'Karim', 'age' => 20],
    ['name' => 'Karim1', 'age' => 14],
    ['name' => 'Karim3', 'age' => 35],
    ['name' => 'Karim', 'age' => 40],
];

// Where Filter the array to get only the elements with age greater than or equal to 20.
$filteredArr = array_filter($arr, function ($item) {
    return $item['age'] >= 20;
});

// Calculate the total age this array.
$totalAge = array_reduce($filteredArr, function ($carry, $item) {
    return $carry + $item['age'];
}, 0);

// Calculate the count of elements.
$count = count($filteredArr);

// Calculate the average age.
$averageAge = $totalAge / $count;

//  Print names
echo "Names with age greater than or equal to 20:\n";
foreach ($filteredArr as $item) {
    echo $item['name'] . "\n";
}

// Print the average age
echo "Average age: $averageAge\n";
