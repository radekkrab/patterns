<?php

namespace App\Creational\AbstractFactory\Windows;

use App\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\Creational\AbstractFactory\Interfaces\GUIFactoryInterface;

class WindowsFactory implements GUIFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new WindowsButton();
    }

    public function createCheckbox(): CheckboxInterface
    {
        return new WindowsCheckbox();
    }
}
