<?php

namespace App\Creational\FactoryMethod\Products;

use App\Creational\FactoryMethod\Products\Transport;

class Ship implements Transport
{
    public function deliver(): string
    {
        return "Груз доставлен морем (корабль)";
    }
}
