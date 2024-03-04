
// 5 no answer.
<?php

function binarySearch($array, $targetAge) {
    $left = 0;
    $right = count($array) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);

        if ($array[$mid]['age'] == $targetAge) {
            return $mid;
        }

        if ($array[$mid]['age'] < $targetAge) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}

// Example ques no 2 chart:
$people = [
    ['name' => 'Korim', 'age' => 20],
    ['name' => 'Korim1', 'age' => 14],
    ['name' => 'Korim3', 'age' => 35],
    ['name' => 'Korim', 'age' => 40]
];

// Sort the array based on age
usort($people, function($a, $b) {
    return $a['age'] - $b['age'];
});

$targetAge = 35;
$index = binarySearch($people, $targetAge);

if ($index != -1) {
    echo "Target age found at index $index\n";
    echo "Name: " . $people[$index]['name'] . ", Age: " . $people[$index]['age'];
} else {
    echo "Target age not found";
}

