<?php

namespace App\Creational\FactoryMethod\Creators;

use App\Creational\FactoryMethod\Products\Transport;
use App\Creational\FactoryMethod\Products\Truck;

class RoadLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Truck();
    }
}
