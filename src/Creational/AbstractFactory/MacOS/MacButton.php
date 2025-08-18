<?php

namespace App\Creational\AbstractFactory\MacOS;

use App\Creational\AbstractFactory\Interfaces\ButtonInterface;

class MacButton implements ButtonInterface
{
    public function render(): string
    {
        return "MacOS Button";
    }
}
