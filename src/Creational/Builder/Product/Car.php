<?php

namespace App\Creational\Builder\Product;

use Stringable;
use App\Creational\Builder\Components\GPS;
use App\Creational\Builder\Components\Engine;
use App\Creational\Builder\Components\Seats;

class Car implements Stringable
{
    public function __construct(private readonly string $model, private readonly Engine $engine, private readonly Seats $seats, private ?GPS $gps = null, private array $extras = [])
    {
    }

    public function setGPS(GPS $gps): void
    {
        $this->gps = $gps;
    }

    public function addExtra(string $extra): void
    {
        $this->extras[] = $extra;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getSeats(): Seats
    {
        return $this->seats;
    }

    public function getGPS(): ?GPS
    {
        return $this->gps;
    }

    public function getExtras(): array
    {
        return $this->extras;
    }

    public function __toString(): string
    {
        $info = [
            "Model: {$this->model}",
            "Engine: {$this->engine}",
            "Seats: {$this->seats}",
        ];

        if ($this->gps) {
            $info[] = "GPS: {$this->gps}";
        }

        if ($this->extras !== []) {
            $info[] = "Extras: " . implode(", ", $this->extras);
        }

        return implode("\n", $info);
    }

}
