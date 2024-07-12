<?php

namespace App\Utils;

class BinaryNode
{
    public $product;
    public $left;
    public $right;

    public function __construct($product)
    {
        $this->product = $product;
        $this->left = null;
        $this->right = null;
    }
}
