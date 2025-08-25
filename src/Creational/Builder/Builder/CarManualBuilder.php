<?php

namespace App\Creational\Builder\Builder;

use App\Creational\Builder\Builder\BuilderInterface;
use App\Creational\Builder\Components\Engine;
use App\Creational\Builder\Components\GPS;
use App\Creational\Builder\Components\Seats;
use App\Creational\Builder\Product\Manual;

class CarManualBuilder implements BuilderInterface
{
    private Manual $manual;

    public function reset(): void
    {
        $this->manual = new Manual('');
    }

    public function __construct()
    {
        $this->reset();
    }

    public function setModel(string $model): void
    {
        $this->manual = new Manual($model);
    }

    public function setEngine(string $type, float $power): void
    {
        $engine = new Engine($type, $power);
        $this->manual->setEngineInstructions($engine);
    }

    public function setSeats(int $count, string $material, bool $heated = false): void
    {
        $seats = new Seats($count, $material, $heated);
        $this->manual->setSeatsInstructions($seats);
    }

    public function setGPS(bool $navigation = false, bool $traffic = false): void
    {
        $gps = new GPS($navigation, $traffic);
        $this->manual->setGPSInstructions($gps);
    }

    public function addExtra(string $extra): void
    {
        $this->manual->addExtraInstruction($extra);
    }

    public function getResult(): Manual
    {
        $result = $this->manual;
        $this->reset();
        return $result;
    }
}
