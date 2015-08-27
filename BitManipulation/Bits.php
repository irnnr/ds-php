<?php
/**
 * Created by PhpStorm.
 * User: ingo
 * Date: 12/9/14
 * Time: 10:03 PM
 */

namespace Irnnr\BitManipulation;


class Bits {

	/**
	 * @param integer $number
	 * @param integer $bitPosition
	 * @return boolean true if the bit at $bitPosition is set, false otherwise
	 */
	public function isBitSet($number, $bitPosition) {
		return (($number & (1 << $bitPosition)) != 0);
	}

	/**
	 * @param integer $number
	 * @param integer $bitPosition
	 * @return integer $number with additional bit set at $bitPosition
	 */
	public function setBit($number, $bitPosition) {
		return $number | (1 << $bitPosition);
	}

	public function clearBit($number, $bitPosition) {
		return $number & ~(1 << $bitPosition);
	}

	/**
	 * Leaves the last $bitPosition bits untouched and clears all bits
	 * prior/from the most significant bit.
	 *
	 * 1111 -> 0011 ($bitPosition = 2)
	 *
	 * @param $number
	 * @param $bitPosition
	 * @return int
	 */
	public function clearMostSignificantBitThroughI($number, $bitPosition) {
		$mask = (1 << $bitPosition) - 1;
		return $number & $mask;
	}

	public function clearBitsThroughZero($number, $bitPosition) {
		$mask = (1 << ($bitPosition + 1)) - 1;
		return $number & ~$mask;
	}

	/**
	 * Set a specific bit to either 0 or 1
	 *
	 * @param $number
	 * @param $bitPosition
	 * @param $bitValue
	 * @return int
	 */
	public function updateBit($number, $bitPosition, $bitValue) {
		$mask = ~(1 << $bitPosition);
		return ($number & $mask) | ($bitValue << $bitPosition);
	}


}