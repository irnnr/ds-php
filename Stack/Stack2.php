<?php
namespace Irnnr\Stack;

/**
 * Stack using an array to store data
 *
 * @package Irnnr\Stack
 */
class Stack2 {

	private $store = array();


	public function push($data) {
		$this->store[] = $data;
	}

	public function pop() {
		$lastIndex = count($this->store) - 1;
		$data = $this->store[$lastIndex];
		unset($this->store[$lastIndex]);

		return $data;
	}

	public function peek() {
		return $this->store[count($this->store) - 1];
	}
}