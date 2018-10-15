<?php

ob_start(); // for removing the printf from other files
include 'Graph.php';
ob_end_clean();

/**
 * DFS - Depth First Search
 * V is the number of vertices.
 * E is the number edges.
 *
 * Time Complexity: O(V + E)
 */
function DFS(&$graph, $s) {
    if ($graph->visited[ $s ]) {
        return;
    }

    $graph->visited[ $s ] = true;
    echo "$s "; // prosess node s

    if (isset($graph->adjacencyList[ $s ])) {
        foreach ($graph->adjacencyList[ $s ] as $u => $weight) {
            DFS($graph, $u);
        }
    }
}

// ----------------
// --- Examples ---
// ----------------
define("NL", PHP_SAPI === 'cli' ? "\n" : "<br />"); // define  new line feed based on web/cli

$graph = new Graph(); // direcred & unweighted

$graph->addEdge(1, 2);
$graph->addEdge(2, 4);
$graph->addEdge(2, 5);
$graph->addEdge(4, 6);
$graph->addEdge(5, 1);
$graph->addEdge(5, 3);

$s = 2;
printf("DFS(graph, %d) = ", $s);
DFS($graph, $s);
