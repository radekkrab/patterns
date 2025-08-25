<?php

namespace App\Creational\Builder\Builder;

use App\Creational\Builder\Builder\BuilderInterface;
use App\Creational\Builder\Components\Engine;
use App\Creational\Builder\Components\GPS;
use App\Creational\Builder\Components\Seats;
use App\Creational\Builder\Product\Car;

class CarBuilder implements BuilderInterface
{
    private Car $car;

    public function reset(): void
    {
        $this->car = new Car('', new Engine('', 0), new Seats(0, ''));
    }

    public function __construct()
    {
        $this->reset();
    }

    public function setModel(string $model): void
    {
        $this->car = new Car($model, $this->car->getEngine(), $this->car->getSeats());
    }

    public function setEngine(string $type, float $power): void
    {
        $engine = new Engine($type, $power);
        $this->car = new Car($this->car->getModel(), $engine, $this->car->getSeats());
    }

    public function setSeats(int $count, string $material, bool $heated = false): void
    {
        $seats = new Seats($count, $material, $heated);
        $this->car = new Car($this->car->getModel(), $this->car->getEngine(), $seats);
    }

    public function setGPS(bool $navigation = false, bool $traffic = false): void
    {
        $gps = new GPS($navigation, $traffic);
        $this->car->setGPS($gps);
    }

    public function addExtra(string $extra): void
    {
        $this->car->addExtra($extra);
    }

    public function getResult(): Car
    {
        $result = $this->car;
        $this->reset();
        return $result;
    }
}
