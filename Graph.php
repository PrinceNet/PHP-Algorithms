<?php

/**
 * Graph Data Structure
 * Assuming each node is connected to at least one other node.
 * Can be direcred/undirecred and/or weighted/unweighted.
 * Using adjacency list.
 */
class Graph
{
    public $undirecred;
    public $weighted;
    public $adjacencyList = [];
    public $nodeCount = 0;
    public $nodes = [];
    public $nodeAsKeys = [];
    public $visited = [];

    // default graph is direcred & unweighted
    public function __construct($undirecred = false, $weighted = false)
    {
        $this->undirecred = $undirecred;
        $this->weighted = $weighted;
    }

    // when we have weighted graph the weight will be 1 for all edges
    public function addEdge($from, $to, $weight = 1)
    {
        $weight = ($this->weighted) ? $weight : 1;

        $this->adjacencyList[ $from ][ $to ] = $weight;

        if ($this->undirecred)
            $this->adjacencyList[ $to ][ $from ] = $weight;

        $this->addNode($from);
        $this->addNode($to);
    }

    public function addNode($node)
    {
        if (! isset($this->nodeAsKeys[ $node ])) {
            $this->nodeAsKeys[ $node ] = true;
            $this->nodes[] = $node;
            $this->nodeCount ++;
            $this->visited[$node] = false;
        }
    }
}

// ----------------
// --- Examples ---
// ----------------

$graph = new Graph(); // direcred & unweighted

$graph->addEdge(1, 2);
$graph->addEdge(2, 3);
$graph->addEdge(2, 4);
$graph->addEdge(3, 4);
$graph->addEdge(4, 1);

var_dump($graph);

$graph = new Graph(true, true); // undirecred & weighted

$graph->addEdge(1, 2, 6);
$graph->addEdge(2, 3, 15);
$graph->addEdge(2, 4, 8);
$graph->addEdge(3, 4, 3);
$graph->addEdge(4, 1, 9);

var_dump($graph);
