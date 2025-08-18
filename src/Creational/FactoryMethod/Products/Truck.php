<?php

namespace App\Creational\FactoryMethod\Products;

use App\Creational\FactoryMethod\Products\Transport;

class Truck implements Transport
{
    public function deliver(): string
    {
        return "Груз доставлен по дороге (грузовик)";
    }
}
