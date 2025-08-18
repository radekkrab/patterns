<?php

namespace App\Creational\AbstractFactory\Windows;

use App\Creational\AbstractFactory\Interfaces\ButtonInterface;

class WindowsButton implements ButtonInterface
{
    public function render(): string
    {
        return "Windows Button";
    }
}
