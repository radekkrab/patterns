<?php

namespace App\Creational\FactoryMethod\Creators;

use App\Creational\FactoryMethod\Products\Transport;

abstract class Logistics
{
    abstract public function createTransport(): Transport;

    public function planDelivery(): string
    {
        $transport = $this->createTransport();
        return $transport->deliver();
    }

}
