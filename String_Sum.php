<?php

/**
 * String Sum
 *
 * Time Complexity: O(max(|str1|, |str2|))
 */
function stringSum($str1, $str2) {
    $s1 = strlen($str1);
    $s2 = strlen($str2);
    $result = '';
    $carry = 0;

    $str1 = strrev($str1);
    $str2 = strrev($str2);

    if ($s1 < $s2) {
		$str1 .= str_repeat("0", $s2 - $s1);
    } elseif ($s1 > $s2) {
		$str2 .= str_repeat("0", $s1 - $s2);
    }

    $s = max($s1, $s2);

    for ($i = 0; $i < $s; $i ++) {
        $sum = (string) ($str1[ $i ] + $str2[ $i ] + $carry);
        if (strlen($sum) > 1) {
            $carry = $sum[0];
            $result .= $sum[1];
        } else {
            $carry = 0;
            $result .= $sum[0];
        }
    }

    if ($carry)
        $result .= $carry;

    return strrev($result);
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$str1 = '123456789';
$str2 = '123456789';
printf("stringSum(%s, %s) = %s" . NL, $str1, $str2, stringSum($str1, $str2));

$str1 = '9999999999';
$str2 = '1234567890';
printf("stringSum(%s, %s) = %s" . NL, $str1, $str2, stringSum($str1, $str2));

$str1 = '32541685478652314569';
$str2 = '17896325469587485316';
printf("stringSum(%s, %s) = %s" . NL, $str1, $str2, stringSum($str1, $str2));
