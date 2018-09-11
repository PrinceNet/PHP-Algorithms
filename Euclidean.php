<?php

/**
 * GCD - Greatest Common Divisor
 *
 * gcd(a, b) = d
 * Time Complexity: O(Log min(a, b))
 */
function gcd($a, $b){
    if ($a === 0)
        return $b;

    return gcd($b % $a, $a);
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$a = 10; $b = 15;
printf("GCD(%d, %d) = %d" . NL, $a, $b, gcd($a, $b));

$a = 35; $b = 10;
printf("GCD(%d, %d) = %d" . NL, $a, $b, gcd($a, $b));

$a = 31; $b = 2;
printf("GCD(%d, %d) = %d" . NL, $a, $b, gcd($a, $b));

$a = 80; $b = 48;
printf("GCD(%d, %d) = %d" . NL, $a, $b, gcd($a, $b));

$a = 144; $b = 89;
printf("GCD(%d, %d) = %d" . NL, $a, $b, gcd($a, $b));
