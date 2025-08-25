<?php

namespace App\Creational\Builder\Components;

use Stringable;

class GPS implements Stringable
{
    public function __construct(private readonly bool $hasNavigation = false, private readonly bool $hasTrafficUpdates = false)
    {
    }

    public function hasNavigation(): bool
    {
        return $this->hasNavigation;
    }

    public function hasTrafficUpdates(): bool
    {
        return $this->hasTrafficUpdates;
    }

    public function __toString(): string
    {
        $features = [];
        if ($this->hasNavigation) {
            $features[] = "navigation";
        }
        if ($this->hasTrafficUpdates) {
            $features[] = "traffic updates";
        }

        return "GPS" . ($features === [] ? "" : " with " . implode(", ", $features));
    }

}
