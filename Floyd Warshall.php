<?php

ob_start(); // for removing the printf from other files
include 'Graph.php';
ob_end_clean();

/**
 * Floyd Warshall
 * finding shortest paths in a weighted graph
 * with positive or negative edge weights (but with no negative cycles).
 *
 * Time Complexity: O(V^3)
 */
function floydWarshall(&$graph) {
    sort($graph->nodes); // for easy representation of distance arr

    $distance = [];
    foreach ($graph->nodes as $key1 => $node1) {
        $distance[ $node1 ] = [];
        foreach ($graph->nodes as $key2 => $node2) {
            if ($node1 === $node2) {
                $distance[ $node1 ][ $node2 ] = 0;
            } elseif (
                isset($graph->adjacencyList[ $node1 ]) &&
                isset($graph->adjacencyList[ $node1 ][ $node2 ]) &&
                $graph->adjacencyList[ $node1 ][ $node2 ]
            ) {
                $distance[ $node1 ][ $node2 ] = $graph->adjacencyList[ $node1 ][ $node2 ];
            } else {
                $distance[ $node1 ][ $node2 ] = INF;
            }
        }
    }

    foreach ($graph->nodes as $key1 => $node1) {
        foreach ($graph->nodes as $key2 => $node2) {
            foreach ($graph->nodes as $key3 => $node3) {
                $distance[ $node1 ][ $node2 ] = min(
                    $distance[ $node1 ][ $node2 ], $distance[ $node1 ][ $node3 ] + $distance[ $node3 ][ $node2 ]
                );
            }
        }
    }

    return $distance;
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$graph = new Graph(false, true); // direcred & weighted

$graph->addEdge(1, 2, 5);
$graph->addEdge(1, 4, 9);
$graph->addEdge(1, 5, 1);
$graph->addEdge(2, 3, 2);
$graph->addEdge(2, 4, 1);
$graph->addEdge(3, 5, 5);
$graph->addEdge(4, 3, 7);
$graph->addEdge(4, 5, 2);
$graph->addEdge(5, 2, 4);

$floydWarshall = floydWarshall($graph);

foreach ($graph->nodes as $key1 => $node1) {
    foreach ($graph->nodes as $key2 => $node2) {
        printf("Path from %s to %s is %s" . NL, $node1, $node2, $floydWarshall[ $node1 ][ $node2 ]);
    }
}
