<?php

// DTO dos itens da sacola
namespace App\Models;

class BagItem 
{
    public $product_id;
    public $name;
    public $price;
    public $quantity;
    public $subtotal;

    public function __construct($product_id, $name, $price, $quantity)
    {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->subtotal = $price * $quantity;
    }
}
