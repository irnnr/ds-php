<?php
namespace Irnnr\BinarySearchTree;


/**
 * A binary search tree node for integers
 *
 * @package Irnnr\BinarySearchTree
 */
class Node {

	public $value;

	/**
	 * @var Node
	 */
	public $left = null;

	/**
	 * @var Node
	 */
	public $right = null;


	/**
	 * @param integer $value An integer value
	 * @param \Irnnr\BinarySearchTree\Node $left (optional) left node
	 * @param \Irnnr\BinarySearchTree\Node $right (optional) right node
	 */
	public function __construct($value, Node $left = null, Node $right = null) {
		if (is_null($value)) {
			throw new \InvalidArgumentException;
		}

		$this->value = intval($value);

		$this->left = $left;
		$this->right = $right;
	}

	public function __toString() {
		return (string) $this->value;
	}

}