<?php

ob_start(); // for removing the printf from other files
include 'Point.php';
ob_end_clean();

/**
 * Polygon Area
 * n is the amount of points of the polygon.
 *
 * Time Complexity: O(n)
 */
function polygonArea($point) {
    $sum = 0;
    $n = count($point);
    for ($i = 0; $i < $n; $i ++) {
        $sum += $point[ $i ]->x * $point[ ($i + 1) % $n ]->y - $point[ ($i + 1) % $n ]->x * $point[ $i ]->y;
    }

    return abs($sum) / 2;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

function stringify2DArray($arr) {
    return '[' . implode(', ', array_map(function ($el) {
            return '(' . implode(', ', (array) $el) . ')';
        }, $arr)) . ']';
}

$points = [
    new Point(0, 1),
    new Point(2, 3),
    new Point(4, 7),
];

printf("polygonArea(%s) = %s" . NL, stringify2DArray($points), polygonArea($points));

$points = [
    new Point(2, 4),
    new Point(5, 5),
    new Point(7, 3),
    new Point(4, 1),
    new Point(4, 3),
];

printf("polygonArea(%s) = %s" . NL, stringify2DArray($points), polygonArea($points));

$points = [
    new Point(1, 2),
    new Point(2, 7),
    new Point(4, 5),
    new Point(5, 3),
    new Point(9, 9),
    new Point(7, 2),
    new Point(4, 1),
];

printf("polygonArea(%s) = %s" . NL, stringify2DArray($points), polygonArea($points));
