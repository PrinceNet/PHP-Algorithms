<?php

/**
 * Binary Search
 *
 * Time Complexity: O(log n)
 */
function binarySearch($arr, $find) {
    $l = 0;
    $r = count($arr) - 1;

    while ($l <= $r) {
        $m = floor(($l + $r) / 2);
        if ($arr[$m] < $find)
            $l = $m + 1;
        elseif ($arr[$m] > $find)
            $r = $m - 1;
        else
            return $m; // element is present
    }

    return false; // element is not present
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$a = [-5, -1, 2, 6, 7, 10, 15]; $find = 6; $bs = binarySearch($a, $find);
$aString = '[' . implode(', ', $a) . ']';
printf("binarySearch(%s) : %d " . (($bs) ? "is at index %s" : "not found") . NL, $aString, $find, $bs);

$a = [-5, -1, 2, 6, 7, 10, 15]; $find = 5; $bs = binarySearch($a, $find);
$aString = '[' . implode(', ', $a) . ']';
printf("binarySearch(%s) : %d " . (($bs) ? "is at index %s" : "not found") . NL, $aString, $find, $bs);

$a = [-5, -1, 2, 6, 7, 10, 15]; $find = -1; $bs = binarySearch($a, $find);
$aString = '[' . implode(', ', $a) . ']';
printf("binarySearch(%s) : %d " . (($bs) ? "is at index %s" : "not found") . NL, $aString, $find, $bs);
