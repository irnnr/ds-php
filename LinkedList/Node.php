<?php
namespace Irnnr\LinkedList;

class Node {

	/**
	 * @var Node
	 */
	public $next = null;

	public $data;


	public function __construct($data) {
		$this->data = $data;
	}

	public function appendToTail($data) {
		$end = new Node($data);
		$n = $this;

		while (!is_null($n->next)) {
			$n = $n->next;
		}
		$n->next = $end;
	}

	public function deleteNode($data) {
		$n = $this;

		while (!is_null($n->next)) {
			if ($n->next->data == $data) {
				$n->next = $n->next->next;
				return;
			}
			$n = $n->next;
		}
	}

}

