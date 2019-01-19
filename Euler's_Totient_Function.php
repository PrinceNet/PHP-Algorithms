<?php

ob_start(); // for removing the printf from other files
include 'Prime Factorization.php';
ob_end_clean();

/**
 * Euler's Totient Function
 * Counts the positive integers up to a given integer n
 * that are relatively prime to n.
 * More formally count the number of integers k
 * in the range 1 <= k <= n such that gcd(k,n) = 1
 * This function works with numbers up to (10^18 - 1).
 *
 * Time Complexity: O(sqrt(n))
 */
function totientFunction($n) {
    $factors = primeFactorization($n);
    $r = 1;
    foreach ($factors as $p => $e) {
        $r *= ($p ** ($e - 1)) * ($p - 1);
    }

    return $r;
}

// ----------------
// --- Examples ---
// ----------------

$n = 7;
printf("totientFunction(%d) = %d" . NL, $n, totientFunction($n));

$n = 60;
printf("totientFunction(%d) = %d" . NL, $n, totientFunction($n));

$n = 123456789;
printf("totientFunction(%d) = %d" . NL, $n, totientFunction($n));

$n = 999999999999999999;
printf("totientFunction(%d) = %d" . NL, $n, totientFunction($n));
