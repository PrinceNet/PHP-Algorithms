<?php

/**
 * Maximum Subarray Problem
 *
 * Time Complexity: O(n)
 */
function kadane($arr){
	$n = count($arr);
	$maxSoFar = $maxEndingHere = 0;

	for($i=0; $i<$n; $i++){
		$maxEndingHere = max(0, $maxEndingHere + $arr[$i]);
		$maxSoFar = max($maxSoFar, $maxEndingHere);
	}

	return $maxSoFar;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$a = [-1, 3, -1, 2, -2, -8, 1, -2, 3];
$aString = '[' . implode(', ', $a) . ']';
printf("kadane(%s) = %d" . NL, $aString, kadane($a));

$a = [10, 20, -50, 12, -3, 24, 60, 11, -5, 15, -17, 1, 2];
$aString = '[' . implode(', ', $a) . ']';
printf("kadane(%s) = %d" . NL, $aString, kadane($a));

$a = [-1, -5, -46, 2, -1, 2, -1, -5, 2, -1 ,4];
$aString = '[' . implode(', ', $a) . ']';
printf("kadane(%s) = %d" . NL, $aString, kadane($a));
