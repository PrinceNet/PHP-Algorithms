<?php

/**
 * Is Prime (Simple Version)
 *
 * Time Complexity: O(sqrt(n))
 */
function isPrime($n) {
    if ($n <= 1)
        return false;
    elseif ($n <= 3)
        return true;
    elseif ($n % 2 == 0 || $n % 3 == 0)
        return false;

    $i = 5;
    while ($i * $i <= $n) {
        if ($n % $i == 0 || $n % ($i + 2) == 0)
            return false;
        $i += 6;
    }

    return true;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$n = 62;
printf("isPrime(%d) = %s" . NL, $n, (isPrime($n)) ? 'Yes' : 'No' );

$n = 563;
printf("isPrime(%d) = %s" . NL, $n, (isPrime($n)) ? 'Yes' : 'No' );

$n = 4789;
printf("isPrime(%d) = %s" . NL, $n, (isPrime($n)) ? 'Yes' : 'No' );

$n = 99991;
printf("isPrime(%d) = %s" . NL, $n, (isPrime($n)) ? 'Yes' : 'No' );

$n = 107863;
printf("isPrime(%d) = %s" . NL, $n, (isPrime($n)) ? 'Yes' : 'No' );
