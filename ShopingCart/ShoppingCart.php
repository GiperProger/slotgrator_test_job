<?php

namespace Market;

class ShoppingCart
{
    private array $items = [];
    private CartRepositoryInterface $repository;

    public function __construct(CartRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->load();
    }

    public function addItem(CartItem $item): void
    {
        if (isset($this->items[$item->productId])) {
            $this->items[$item->productId]['quantity'] += $item->quantity;
        } else {
            $this->items[$item->productId] = [
                'productId' => $item->productId,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ];
        }
        $this->save();
    }

    public function deleteItem(int $productId): void
    {
        unset($this->items[$productId]);
        $this->save();
    }

    public function getItems(): array
    {
        return array_values($this->items);
    }

    public function getItemsCount(): int
    {
        return count($this->items);
    }

    public function calculateTotalSum(): float
    {
        return array_reduce($this->items, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);
    }

    public function save(): void
    {
        $this->repository->save($this->items);
    }

    public function load(): void
    {
        $this->items = $this->repository->load();
    }

    public function update(int $productId, int $quantity): void
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] = $quantity;
            $this->save();
        }
    }

    public function delete(): void
    {
        $this->items = [];
        $this->save();
    }
}