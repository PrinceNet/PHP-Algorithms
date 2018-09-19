<?php

ob_start(); // for removing the printf from other files
include 'Euclidean Extended.php';
ob_end_clean();

/**
 * Modular Multiplicative Inverse
 * a and b will be coprime if gcd(a, b) = 1
 * Given a and m, finds x such that:
 * (a * x) mod m = 1
 *
 * Time Complexity: O(log min(a, m))
 */
function modularInverse($a, $m) {
    $x; $y;
    $gcd = gcdExtended($a, $m, $x, $y);

    return ($gcd == 1) ? (($x % $m) + $m) % $m : null;
}

// ----------------
// --- Examples ---
// ----------------

$a = 5;
$m = 8;
$r = modularInverse($a, $m) ?? 'Not exist';
printf("modularInverse(%d, %d) = %s" . NL, $a, $m, $r);

$a = 35;
$m = 55;
$r = modularInverse($a, $m) ?? 'Not exist';
printf("modularInverse(%d, %d) = %s" . NL, $a, $m, $r);

$a = 34;
$m = 89;
$r = modularInverse($a, $m) ?? 'Not exist';
printf("modularInverse(%d, %d) = %s" . NL, $a, $m, $r);
