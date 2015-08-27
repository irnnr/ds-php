<?php
namespace Irnnr\BitManipulation;

include 'Bits.php';

$b = new Bits();
echo $b->isBitSet(6, 0);
echo $b->setBit(6, 0);
echo $b->clearBit(7, 0);
echo $b->clearMostSignificantBitThroughI(15, 2);
echo $b->clearBitsThroughZero(15, 1);
echo $b->updateBit(11, 2, 1);
echo $b->updateBit(15, 2, 0);

