<?php

/**
 * Binomial Coefficient
 * nCk means n choose k
 * nCk = n! / k! * (n - k)!
 * where n >= k >= 0
 *
 * Time Complexity: O(k)
 */
function nCk($n, $k) {
    $res = 1;

    // Since C(n, k) = C(n, n-k)
    if ($k > $n - $k)
        $k = $n - $k;

    // Calculate value of
    // [n * (n-1) *---* (n-k+1)] / [k * (k-1) *----* 1]
    for ($i = 0; $i < $k; $i ++) {
        $res *= ($n - $i);
        $res /= ($i + 1);
    }

    return $res;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$n = 5; $k = 5;
printf("nCk(%d, %d) = (%d)" . NL, $n, $k, nCk($n, $k));

$n = 10; $k = 2;
printf("nCk(%d, %d) = (%d)" . NL, $n, $k, nCk($n, $k));

$n = 10; $k = 8;
printf("nCk(%d, %d) = (%d)" . NL, $n, $k, nCk($n, $k));

$n = 15; $k = 9;
printf("nCk(%d, %d) = (%d)" . NL, $n, $k, nCk($n, $k));
