<?php

/**
 * KMP - Knuth–Morris–Pratt string-searching algorithm.
 * searches for all occurrences of a word within a text.
 *
 * Time Complexity: O(n+m)
 */
function KMP($p, $txt) {
    $m = strlen($p);
    $n = strlen($txt);

    $LPS = LPS($p, $m);
    $matchIndexes = []; // matche substrings that starts at index k

    $i = 0; // index for txt
    $j = 0; // index for p
    while ($i < $n) {
        if ($p[$j] === $txt[$i]) {
            $j++;
            $i++;
        }

        if ($j === $m) {
            $matchIndexes[] = $i - $j;
            $j = $LPS[$j - 1];
        }

        else if ($i < $n && $p[$j] !== $txt[$i]) { // mismatch occurs
            if ($j !== 0)
                $j = $LPS[$j - 1];
            else
                $i = $i + 1;
        }
    }

    return $matchIndexes;
}

/**
 * LPS - Longest proper Prefix which is also Suffix
 * proper prefix not including the whole word as a prefix
 *
 * Time Complexity: O(m)
 */
function LPS($p, $m) {
    $len = 0;
    $LPS = [];
    $LPS[0] = 0;

    $i = 1;
    while ($i < $m) {
        if ($p[$i] === $p[$len]) {
            $len++;
            $LPS[$i] = $len;
            $i++;
        } else  {
            if ($len !== 0) {
                $len = $LPS[$len - 1];
            } else {
                $LPS[$i] = 0;
                $i++;
            }
        }
    }

    return $LPS;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$p = 'sun';
$txt = <<<TXT
Sunset is the time of day when our sky meets the outer space solar winds.
There are blue, pink, and purple swirls, spinning and twisting,
like clouds of balloons caught in a blender.
The sun moves slowly to hide behind the line of horizon,
while the moon races to take its place in prominence atop the night sky.
People slow to a crawl, entranced,
fully forgetting the deeds that still must be done. There is a coolness,
a calmness, when the sun does set.
TXT;

$results = KMP($p, $txt);
printf("Running KMP..." . NL . NL);

if($results){
    foreach ($results as $key => $result) {
        printf("Found pattern at index: %d" . NL, $result);
    }
} else {
    printf("No pattern was found." . NL);
}
