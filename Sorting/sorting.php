<?php
namespace Irnnr\Sorting;
include 'MergeSort.php';
include 'BubbleSort.php';



$ms = new MergeSort();
$msArray = array(5,4,2,6,3,1);
$ms->sort($msArray);

$bs = new BubbleSort();
$bsArray = array(5,4,2,6,3,1);
$bs->sort($bsArray);


