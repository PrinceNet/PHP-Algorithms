<?php

/**
 * Fisher Yates Shuffle
 * Shuffle a given array
 *
 * Time Complexity: O(n)
 */
function fisherYatesShuffle(&$arr) {
    $n = count($arr);
    if ($n === 0) {
        return; // do nothing since nothing in array
    } else {
        $k = $n - 1; // set k to be the last index in array
        while ($k) {
            $r = mt_rand(0, $k);
            swap($arr[$r], $arr[$k]);
            $k--;
        }
    }
}

function swap(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$aString = '[' . implode(', ', $arr) . ']';
fisherYatesShuffle($arr);
$fisherYatesShuffle = '[' . implode(', ', $arr) . ']';
printf("fisherYatesShuffle(%s) = %s" . NL, $aString, $fisherYatesShuffle);

$arr = ['shuffle', 'me', 'and', 'see', 'what', 'you', 'get'];
$aString = '[' . implode(', ', $arr) . ']';
fisherYatesShuffle($arr);
$fisherYatesShuffle = '[' . implode(', ', $arr) . ']';
printf("fisherYatesShuffle(%s) = %s" . NL, $aString, $fisherYatesShuffle);