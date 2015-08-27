<?php
namespace Irnnr\Sorting;


class MergeSort {

	public function sort(array &$input) {
		$helper = array();
		$this->mergeSort($input, $helper, 0, count($input) - 1);
	}

	private function mergeSort(array &$input, array &$helper, $low, $high) {
		if ($low < $high) {
			$middle = (int) (($low + $high) / 2);
			$this->mergeSort($input, $helper, $low, $middle); // sort left half
			$this->mergeSort($input, $helper, $middle + 1, $high); // sort right half
			$this->merge($input, $helper, $low, $middle, $high); // merge back
		}
	}

	private function merge(array &$input, array &$helper, $low, $middle, $high) {
		for ($i = $low; $i <= $high; $i++) {
			$helper[$i] = $input[$i];
		}

		$helperLeft  = $low;
		$helperRight = $middle + 1;
		$current     = $low;

		while ($helperLeft <= $middle && $helperRight <= $high) {
			if ($helper[$helperLeft] <= $helper[$helperRight]) {
				$input[$current] = $helper[$helperLeft];
				$helperLeft++;
			} else {
				$input[$current] = $helper[$helperRight];
				$helperRight++;
			}

			$current++;
		}

		$remaining = $middle - $helperLeft;
		for ($i = 0; $i <= $remaining; $i++) {
			$input[$current + $i] = $helper[$helperLeft + $i];
		}
	}
}