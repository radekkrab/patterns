<?php

namespace App\Creational\FactoryMethod\Creators;

use App\Creational\FactoryMethod\Products\Ship;
use App\Creational\FactoryMethod\Products\Transport;

class SeaLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Ship();
    }
}
