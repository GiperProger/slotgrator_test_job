<?php

namespace Market;

interface CartRepositoryInterface
{
    public function save(array $items): void;
    public function load(): array;
}