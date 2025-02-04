<?php

namespace Market;

class CartPrinter
{
    public function printOrder(array $items): string
    {
        return json_encode($items, JSON_PRETTY_PRINT);
    }

    public function showOrder(array $items): void
    {
        echo $this->printOrder($items);
    }
}