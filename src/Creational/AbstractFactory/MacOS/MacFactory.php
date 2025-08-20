<?php

namespace App\Creational\AbstractFactory\MacOS;

use App\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\Creational\AbstractFactory\Interfaces\GUIFactoryInterface;

class MacFactory implements GUIFactoryInterface
{
    public function createButton(): ButtonInterface
    {
        return new MacButton();
    }

    public function createCheckbox(): CheckboxInterface
    {
        return new MacCheckbox();
    }
}
