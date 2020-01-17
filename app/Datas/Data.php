<?php

namespace App\Datas;

use Countable;

abstract class Data implements Countable
{
    protected $items = [];

    public function __construct()
    {
        $this->items = $this->data();
    }

    public function get(int $key)
    {
        return $this->items[$key];
    }

    public function random()
    {
        return $this->items[random_int(0, $this->count())];
    }

    public function count(): int
    {
        return count($this->items);
    }

    abstract public function data(): array;
}
