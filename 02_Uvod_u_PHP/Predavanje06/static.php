<?php

function randomAdd(int $number): int {
    static $sum = 0;
    $sum += $number;
    return $sum;
}

$sum = randomAdd(5);
echo $sum; // 5
$sum = randomAdd(5);
echo $sum; // 10

?>