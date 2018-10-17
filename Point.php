<?php

/**
 * Point Structure
 * 2D point.
 */
class Point
{
    public $x;
    public $y;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

// ----------------
// --- Examples ---
// ----------------

$points = [
    new Point(2, 4),
    new Point(5, 5),
    new Point(7, 3),
    new Point(4, 1),
    new Point(4, 3),
];

var_dump($points);
