<?php

/**
 * Activity Selection
 * given n activities with their start and finish times.
 * select the maximum number of activities that can be
 * performed by a single person or machine,
 * assuming that a person can only work on a single activity at a time
 *
 * Time Complexity: O(n * log n)
 */
function activitySelection($A) {
    // adjust the activities for easy access later
    foreach ($A as $key => &$activity) {
        $activity['start'] = $activity[0];
        $activity['finish'] = $activity[1];
        unset($activity[0], $activity[1]);
    }

    // Sort activity by finish times
    usort($A, function ($a, $b) {
        return $a['finish'] <=> $b['finish'];
    });

    $S = [$A[0]]; // add first activity to set
    $k = 0; // last selected activity
    $n = count($A);

    for ($i = 1; $i < $n; $i ++) {
        // pick next activiry if no intersection occure
        if ($A[ $i ]['start'] >= $A[ $k ]['finish']) {
            $S[] = $A[ $i ];
            $k = $i;
        }
    }

    return $S;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

function stringify2DArray($arr) {
    return '[' . implode(', ', array_map(function ($el) {
            return '(' . implode(', ', $el) . ')';
        }, $arr)) . ']';
}

$A = [[5, 9], [1, 2], [3, 4], [0, 6], [5, 7], [8, 9]];
$aString = stringify2DArray($A);
$selected = activitySelection($A);
$selectedString = stringify2DArray($selected);
printf("activitySelection(%s) = %s " . NL, $aString, $selectedString);

$A = [[1, 5], [3, 8], [7, 9], [7, 14], [10, 17], [9, 13], [14, 25], [15, 20]];
$aString = stringify2DArray($A);
$selected = activitySelection($A);
$selectedString = stringify2DArray($selected);
printf("activitySelection(%s) = %s " . NL, $aString, $selectedString);
