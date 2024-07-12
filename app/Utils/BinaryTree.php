<?php
namespace App\Utils;
class BinaryTree
{
    public $root;
    public function __construct()
    {
        $this->root = null;
    }
    public function insert($product)
    {
        $newNode = new BinaryNode($product);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode);
        }
    }
    private function insertNode($node, $newNode)
    {
        if (strtotime($newNode->product->created_at) < strtotime($node->product->created_at)) {
            if ($node->left === null) {
                $node->left = $newNode;
            } else {
                $this->insertNode($node->left, $newNode);
            }
        } else {
            if ($node->right === null) {
                $node->right = $newNode;
            } else {
                $this->insertNode($node->right, $newNode);
            }
        }
    }
    public function inOrderTraversal($node, &$result)
    {
        if ($node !== null) {
            $this->inOrderTraversal($node->left, $result);
            $result[] = $node->product;
            $this->inOrderTraversal($node->right, $result);
        }
    }
    public function getProductsInOrder()
    {
        $result = [];
        $this->inOrderTraversal($this->root, $result);
        return $result;
    }
}
