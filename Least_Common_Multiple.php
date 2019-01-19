<?php

ob_start(); // for removing the printf from other files
include 'Euclidean.php';
ob_end_clean();

/**
 * LCM - Least Common Multiple
 *
 * lcm(a, b) = (a*b)/gcd(a, b)
 * Time Complexity: O(log min(a, b))
 */
function lcm($a, $b) {
    return ($a * $b) / gcd($a, $b);
}

// ----------------
// --- Examples ---
// ----------------

$a = 10; $b = 15;
printf("LCM(%d, %d) = %d" . NL, $a, $b, lcm($a, $b));

$a = 35; $b = 10;
printf("LCM(%d, %d) = %d" . NL, $a, $b, lcm($a, $b));

$a = 31; $b = 2;
printf("LCM(%d, %d) = %d" . NL, $a, $b, lcm($a, $b));

$a = 80; $b = 48;
printf("LCM(%d, %d) = %d" . NL, $a, $b, lcm($a, $b));

$a = 144; $b = 89;
printf("LCM(%d, %d) = %d" . NL, $a, $b, lcm($a, $b));
