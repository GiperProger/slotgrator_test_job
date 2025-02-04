<?php

namespace Market;

class CartItem
{
    public int $productId;
    public string $name;
    public float $price;
    public int $quantity;

    public function __construct(int $productId, string $name, float $price, int $quantity = 1)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}