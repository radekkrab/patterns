<?php

namespace App\Creational\Builder\Components;

use Stringable;

class Seats implements Stringable
{
    public function __construct(private readonly int $count, private readonly string $material, private readonly bool $hasHeating = false)
    {
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getMaterial(): string
    {
        return $this->material;
    }

    public function hasHeating(): bool
    {
        return $this->hasHeating;
    }

    public function __toString(): string
    {
        $heating = $this->hasHeating ? ", heated" : "";
        return "{$this->count} {$this->material} seats{$heating}";
    }

}
