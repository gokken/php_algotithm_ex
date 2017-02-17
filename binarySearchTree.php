<?php
require_once './part/BinaryTree.php';

$tree = new BinaryTree();

$node_tree = $tree::createNode(10);

$node_tree = $tree::insertNode(6,$node_tree);
$node_tree = $tree::insertNode(5,$node_tree);
$node_tree = $tree::insertNode(10,$node_tree);
$node_tree = $tree::insertNode(12,$node_tree);
$node_tree = $tree::insertNode(8,$node_tree);
$node_tree = $tree::insertNode(9,$node_tree);
$node_tree = $tree::insertNode(7,$node_tree);


$tree_check = $tree::searchTree(10,$node_tree);


?>
