<?php

/**
 * GCD - Greatest Common Divisor
 *
 * gcd(a, b) = ax + by = d
 * Time Complexity: O(Log min(a, b))
 */
function gcdExtended($a, $b, &$x, &$y){
    if ($a === 0){
        $x = 0;
        $y = 1;

        return $b;
    }

    $gcd = gcdExtended($b % $a, $a, $x1, $y1);

    $x = $y1 - ((int)($b / $a)) * $x1;
    $y = $x1;

    return $gcd;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$x; $y; $a = 10; $b = 15; $gcd = gcdExtended($a, $b, $x, $y);
printf("GCD(%d, %d) = (%d)*(%d) + (%d)*(%d) = %d" . NL, $a, $b, $a, $x, $b, $y, $gcd);

$x; $y; $a = 35; $b = 10; $gcd = gcdExtended($a, $b, $x, $y);
printf("GCD(%d, %d) = (%d)*(%d) + (%d)*(%d) = %d" . NL, $a, $b, $a, $x, $b, $y, $gcd);

$x; $y; $a = 31; $b = 2; $gcd = gcdExtended($a, $b, $x, $y);
printf("GCD(%d, %d) = (%d)*(%d) + (%d)*(%d) = %d" . NL, $a, $b, $a, $x, $b, $y, $gcd);

$x; $y; $a = 80; $b = 48; $gcd = gcdExtended($a, $b, $x, $y);
printf("GCD(%d, %d) = (%d)*(%d) + (%d)*(%d) = %d" . NL, $a, $b, $a, $x, $b, $y, $gcd);

$x; $y; $a = 144; $b = 89; $gcd = gcdExtended($a, $b, $x, $y);
printf("GCD(%d, %d) = (%d)*(%d) + (%d)*(%d) = %d" . NL, $a, $b, $a, $x, $b, $y, $gcd);
