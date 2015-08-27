<?php
namespace Irnnr\Stack;

use Irnnr\LinkedList\Node;


/**
 * Stack using a LinkedList to store data
 *
 * @package Irnnr\Stack
 */
class Stack {

	/**
	 * @var Node
	 */
	private $top = null;


	public function pop() {
		$data = null;

		if (!is_null($this->top)) {
			$data = $this->top->data;
			$this->top = $this->top->next;
		}

		return $data;
	}

	public function push($data) {
		$n = new Node($data);
		$n->next = $this->top;
		$this->top = $n;
	}

	public function peek() {
		return $this->top->data;
	}


}