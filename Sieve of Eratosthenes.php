<?php

/**
 * Sieve of Eratosthenes
 * compute all the prime numbers that are smaller than or equal to n.
 * holds numbers from 2 to n (by index).
 * 1. $sieve[$k] == false means that $k is prime.
 * 2. $sieve[$k] != false means that $k is composite,
 *    and $sieve[$k] is one of his prime factors.
 *
 * Time Complexity: O(n * log(log(n)))
 */
function sieveOfEratosthenes($n) {
    $sieve = array_fill(2, $n - 1, false);

    for ($p = 2; $p * $p <= $n; $p ++) {
        if (! $sieve[ $p ]) {
            for ($i = $p * $p; $i <= $n; $i += $p)
                $sieve[ $i ] = $p;
        }
    }

    return $sieve;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

function getPrimes($n) {
    return array_keys(
        array_filter(sieveOfEratosthenes($n), function ($p) {
            return (! $p);
        })
    );
}

$n = 1;
$primes = getPrimes($n);
printf("sieveOfEratosthenes(%d) = [%s]" . NL, $n, implode(', ', $primes));

$n = 20;
$primes = getPrimes($n);
printf("sieveOfEratosthenes(%d) = [%s]" . NL, $n, implode(', ', $primes));

$n = 50;
$primes = getPrimes($n);
printf("sieveOfEratosthenes(%d) = [%s]" . NL, $n, implode(', ', $primes));

$n = 100;
$primes = getPrimes($n);
printf("sieveOfEratosthenes(%d) = [%s]" . NL, $n, implode(', ', $primes));
