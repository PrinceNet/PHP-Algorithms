<?php

/**
 * Insertion Sort
 *
 * Time Complexity: O(n^2)
 */
function insertionSort(&$arr) {
    $n = count($arr);

    for ($i = 1; $i < $n; $i++) {
        $val = $arr[$i];
        $j = $i-1;

        while ($j >= 0 && $arr[$j] > $val) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }

        $arr[$j + 1] = $val;
    }
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$a = [4, -5, 1, -2, 6, 8, 11, -3, 0];
$aStringPreSort = '[' . implode(', ', $a) . ']';
insertionSort($a);
$aStringPostSort = '[' . implode(', ', $a) . ']';
printf("insertionSort(%s) = %s" . NL, $aStringPreSort, $aStringPostSort);

$a = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0];
$aStringPreSort = '[' . implode(', ', $a) . ']';
insertionSort($a);
$aStringPostSort = '[' . implode(', ', $a) . ']';
printf("insertionSort(%s) = %s" . NL, $aStringPreSort, $aStringPostSort);

$a = [-5, 4, 8, -12, -100, 99, 56, 150];
$aStringPreSort = '[' . implode(', ', $a) . ']';
insertionSort($a);
$aStringPostSort = '[' . implode(', ', $a) . ']';
printf("insertionSort(%s) = %s" . NL, $aStringPreSort, $aStringPostSort);
