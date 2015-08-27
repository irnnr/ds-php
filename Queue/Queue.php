<?php
namespace Irnnr\Queue;

use Irnnr\LinkedList\Node;

class Queue {

	/**
	 * @var Node
	 */
	private $first = null;

	/**
	 * @var Node
	 */
	private $last = null;


	public function enqueue($data) {
		$n = new Node($data);

		if (is_null($this->last)) {
			$this->first = $this->last = $n;
		} else {
			$this->last->next = $n;
			$this->last = $this->last->next;
		}
	}

	public function dequeue() {
		$data = null;

		if (!is_null($this->first)) {
			$data = $this->first->data;
			$this->first = $this->first->next;

			if (is_null($this->first)) {
				$this->last = null;
			}
		}

		return $data;
	}
}