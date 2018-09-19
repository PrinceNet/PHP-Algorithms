<?php

/**
 * Modular Exponentiation
 * efficient way to compute (x ^ n) % m
 *
 * Time Complexity: O(log n)
 */
function modularExponentiation($x, $n, $m) {
    $r = 1;
    $x %= $m;

    while ($n) {
        if ($n % 2 == 1)
            $r = ($r * $x) % $m;
        $x = ($x * $x) % $m;
        $n = $n >> 1; // $n = floor($n / 2);
    }

    return $r;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli
define("M", 1e9 + 7);

$x = 9;
$n = 123;
printf("(%d ^ %d) mod %d = %s" . NL, $x, $n, M, modularExponentiation($x, $n, M));

$x = 5;
$n = 999;
printf("(%d ^ %d) mod %d = %s" . NL, $x, $n, M, modularExponentiation($x, $n, M));

$x = 14;
$n = 123456789;
printf("(%d ^ %d) mod %d = %s" . NL, $x, $n, M, modularExponentiation($x, $n, M));
