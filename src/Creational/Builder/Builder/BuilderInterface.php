<?php

namespace App\Creational\Builder\Builder;

use App\Creational\Builder\Product\Car;
use App\Creational\Builder\Product\Manual;

interface BuilderInterface
{
    public function reset(): void;
    public function setModel(string $model): void;
    public function setEngine(string $type, float $power): void;
    public function setSeats(int $count, string $material, bool $heated = false): void;
    public function setGPS(bool $navigation = false, bool $traffic = false): void;
    public function addExtra(string $extra): void;
    public function getResult(): Car|Manual;

}
