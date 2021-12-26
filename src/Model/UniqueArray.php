<?php

namespace App\Model;

class UniqueArray
{
    private $container = [];

    public function add($item): void
    {
        $this->container[] = $item;
    }

    public function get(): array
    {
        $items = [];

        foreach ($this->container as $value) {
            if (in_array($value, $items)) {
                continue;
            }
            $items[] = $value;
        }

        return $items;
    }
}
