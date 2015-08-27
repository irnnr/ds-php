<?php
namespace Irnnr\BinarySearchTree;

include 'Node.php';
include 'BinarySearchTree.php';

/**
 *           0
 *         /   \
 *       -5     5
 *       / \   / \
 *    -10  -4 3   20
 */
$tree = new BinarySearchTree(new Node(0));

$tree->root->left = new Node(-5);
$tree->root->left->left = new Node(-10);
$tree->root->left->right = new Node(-4);

$tree->root->right = new Node(5);
$tree->root->right->left = new Node(3);
$tree->root->right->right = new Node(20);
#$tree->root->right->right->left = new Node(18);

echo "\n";

$simpleSearchNode = $tree->search(20);
var_dump($simpleSearchNode);
echo "\n";

$nonexistentNode = $tree->searchDepthFirst(10);
var_dump($nonexistentNode);
echo "\n";

$foundNodeDfs = $tree->searchDepthFirst(-4);
echo $foundNodeDfs . "\n";
$foundNodeBfs = $tree->searchBreadthFirst(20);
echo $foundNodeBfs . "\n";

$tree->traversePreOrder($tree->root);
echo "\n";
$tree->traversePreOrderIterative($tree->root);
echo "\n";
$tree->traverseInOrder($tree->root);
echo "\n";
$tree->traversePostOrder($tree->root);
echo "\n";
$tree->traverseBreadthFirstRecursive($tree->root);
echo "\n";
$tree->traverseBreadthFirstIterative($tree->root);
echo "\n";

$tree->insert(2);
$tree->traverseInOrder($tree->root);

echo "\n";
$emptyTree = new BinarySearchTree();
$emptyTree->insert(new Node(8));
$emptyTree->traversePreOrder($emptyTree->root);



echo "\n";