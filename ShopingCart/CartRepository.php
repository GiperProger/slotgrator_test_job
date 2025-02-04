<?php

namespace Market;

class CartRepository implements CartRepositoryInterface
{
    private string $filePath = 'cart.json';

    public function save(array $items): void
    {
        file_put_contents($this->filePath, json_encode($items));
    }

    public function load(): array
    {
        return file_exists($this->filePath) ? json_decode(file_get_contents($this->filePath), true) ?? [] : [];
    }
}
