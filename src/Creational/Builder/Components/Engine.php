<?php

namespace App\Creational\Builder\Components;

use Stringable;

class Engine implements Stringable
{
    public function __construct(private readonly string $type, private readonly float $power)
    {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getPower(): float
    {
        return $this->power;
    }

    public function __toString(): string
    {
        return "{$this->type} engine ({$this->power} HP)";
    }
}
