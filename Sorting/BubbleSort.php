<?php
namespace Irnnr\Sorting;


class BubbleSort {

	public function sort(&$input) {

		do {
			$swapped = false;

			for ($i = 0; $i < count($input) - 1; $i++) {
				$left = $i;
				$right = $i + 1;

				if ($input[$right] < $input[$left]) {
					$tmp = $input[$left];
					$input[$left] = $input[$right];
					$input[$right] = $tmp;

					$swapped = true;
				}
			}
		} while($swapped);
	}

}