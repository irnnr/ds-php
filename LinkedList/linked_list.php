<?php
namespace Irnnr\LinkedList;

include 'Node.php';

$linkedList = new Node('a');
$linkedList->appendToTail('b');
$linkedList->appendToTail('c');
$linkedList->appendToTail('d');
$linkedList->appendToTail('e');
$linkedList->appendToTail('f');

$linkedList->deleteNode('d');