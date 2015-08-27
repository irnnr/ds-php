<?php
namespace Irnnr\BinarySearchTree;


/**
 * Allows operations on binary search trees.
 *
 * A binary search tree is a binary tree, meaning that a node always has two
 * child nodes. The children can be null though. If both children are null, the
 * node is called a leaf.
 * The special property of a binary search tree is that all values left of a
 * node are smaller/less than the current node's value; all values to the right
 * are bigger/greater. Trying to insert values that already exist in the tree
 * (equal) is considered an error.
 *
 * Example:
 *           0
 *         /   \
 *       -5     5
 *       / \   / \
 *     -8  -4 7   9
 *
 * @package Irnnr\BinarySearchTree
 */
class BinarySearchTree {

	/**
	 * @var Node
	 */
	public $root = null;


	/**
	 * Creates a binary search tree.
	 *
	 * @param \Irnnr\BinarySearchTree\Node $root
	 */
	public function __construct(Node $root = null) {
		$this->root = $root;
	}

	public function visit(Node $n) {
		echo $n->value . ' ';
	}

	public function search($value, Node $n = null) {
		if (is_null($n)) {
			$n = $this->root;
		}

		while (!is_null($n)) {
			if ($n->value == $value) {
				return $n;
			} else if ($value > $n->value) {
				$n = $n->right;
			} else {
				$n = $n->left;
			}
		}

		return false;
	}

	/**
	 * Searches for a Node with value $value and returns it when found.
	 *
	 * @param integer $value
	 * @param \Irnnr\BinarySearchTree\Node $n
	 * @return \Irnnr\BinarySearchTree\Node
	 */
	public function searchDepthFirst($value, Node $n = null) {
		if (is_null($n)) {
			$n = $this->root;
		}

		if (is_null($value) || !is_int($value)) {
			throw new \InvalidArgumentException;
		}

		if ($n->value == $value) {
			return $n;
		} else {

			if ($value < $n->value && !is_null($n->left)) {
				return $this->searchDepthFirst($value, $n->left);
			} else if ($value > $n->value && !is_null($n->right)) {
				return $this->searchDepthFirst($value, $n->right);
			}

			return false;
		}
	}

	/**
	 * Breadth First Search (BFS).
	 * Doesn't make a lot of sense for binary search trees.
	 *
	 * @param integer $value
	 * @param \Irnnr\BinarySearchTree\Node $n
	 * @return bool|\Irnnr\BinarySearchTree\Node|mixed
	 */
	public function searchBreadthFirst($value, Node $n = null) {
		if (is_null($n)) {
			$n = $this->root;
		}

		static $queue = array();

		if ($n->value == $value) {
			return $n;
		} else {
			if (
				($value < $n->value && $value > $n->left->value)
				||
				($value > $n->value && $value < $n->right->value)
			) {
				return false;
			}

			if ($value < $n->value && !is_null($n->left)) {
				$queue[] = $n->left;
			}
			if ($value > $n->value && !is_null($n->right)) {
				$queue[] = $n->right;
			}
		}

		do {
			$n = array_shift($queue);
			return $this->searchBreadthFirst($value, $n);
		} while (!empty($queue));
	}

	// --- traversal ---

	public function traversePreOrder(Node $n = null) {
		if (is_null($n)) {
			return;
		}

		$this->visit($n);
		$this->traversePreOrder($n->left);
		$this->traversePreOrder($n->right);
	}

	public function traversePreOrderIterative(Node $root = null) {
		if (is_null($root)) {
			$root = $this->root;
		}

		$traversalStack = [$root];

		while (!empty($traversalStack)) {
			$n = array_pop($traversalStack);

			$this->visit($n);

			// adding the right child first so that the left child is on top of
			// the stack and then gets processed first/next
			if (!is_null($n->right)) {
				$traversalStack[] = $n->right;
			}

			if (!is_null($n->left)) {
				$traversalStack[] = $n->left;
			}
		}

	}

	public function traverseInOrder(Node $n = null) {
		if (is_null($n)) {
			return;
		}

		$this->traverseInOrder($n->left);
		$this->visit($n);
		$this->traverseInOrder($n->right);
	}

	public function traversePostOrder(Node $n = null) {
		if (is_null($n)) {
			return;
		}

		$this->traversePostOrder($n->left);
		$this->traversePostOrder($n->right);
		$this->visit($n);
	}

	public function traverseBreadthFirstRecursive(Node $n = null) {
		if (is_null($n)) {
			return;
		}

		static $queue = array();

		$this->visit($n);
		$queue[] = $n->left;
		$queue[] = $n->right;

		do {
			$n = array_shift($queue);
			$this->traverseBreadthFirstRecursive($n);
		} while (!empty($queue));
	}

	public function traverseBreadthFirstIterative(Node $root) {
		/**
		 * @var Node[]
		 */
		$queue = [$root];

		while (!empty($queue)) {
			$n = array_shift($queue);
			$this->visit($n);

			if (!is_null($n->left)) {
				$queue[] = $n->left;
			}

			if (!is_null($n->right)) {
				$queue[] = $n->right;
			}
		}
	}

	public function insert($newNode) {
		if (!($newNode instanceof Node)) {
			$newNode = new Node(intval($newNode));
		}

		// empty tree
		if (is_null($this->root)) {
			$this->root = $newNode;
			return;
		}

		$currentNode = $this->root;
		$previousNode = null;

		// find a leaf
		while (!is_null($currentNode)) {
			$previousNode = $currentNode;
			if ($newNode->value < $previousNode->value) {
				$currentNode = $currentNode->left;
			} else {
				$currentNode = $currentNode->right;
			}
		}

		// which side to insert the new node
		if ($newNode->value < $previousNode->value) {
			$previousNode->left = $newNode;
		} else {
			$previousNode->right = $newNode;
		}
	}



}