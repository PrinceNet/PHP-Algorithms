<?php

/**
 * Prime Factorization
 * compute all the prime factors of n.
 * finds all pi, ei such that
 * n = p1^e1 * p2^e2 * ... * pk^ek
 * where p1, p2, ..., pk are distinct primes and
 * e1, e2, ..., ek are positive numbers.
 *
 * Time Complexity: O(sqrt(n))
 */
function primeFactorization($n) {
    $factors = [];

    while ($n % 2 === 0) {
        addPrime($factors, 2);
        $n /= 2;
    }

    for ($i = 3; $i * $i <= $n; $i += 2) {
        while ($n % $i === 0) {
            addPrime($factors, $i);
            $n /= $i;
        }
    }

    if ($n > 2)
        addPrime($factors, $n);

    return $factors;
}

function addPrime(&$factors, $p) {
    if (! isset($factors[ $p ]))
        $factors[ $p ] = 1;
    else
        $factors[ $p ] ++;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

function getMathRepresentation($primeFactorization) {
    $r = '';
    foreach ($primeFactorization as $p => $e) {
        $r .= "$p^$e * ";
    }

    return substr($r, 0, - 3);
}

$n = 384;
$s = getMathRepresentation(primeFactorization($n));
printf("primeFactorization(%d) = %s" . NL, $n, $s);

$n = 36960;
$s = getMathRepresentation(primeFactorization($n));
printf("primeFactorization(%d) = %s" . NL, $n, $s);

$n = 123456789;
$s = getMathRepresentation(primeFactorization($n));
printf("primeFactorization(%d) = %s" . NL, $n, $s);

$n = 979797979797;
$s = getMathRepresentation(primeFactorization($n));
printf("primeFactorization(%d) = %s" . NL, $n, $s);
