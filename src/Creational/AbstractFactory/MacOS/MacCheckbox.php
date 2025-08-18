<?php

namespace App\Creational\AbstractFactory\MacOS;

use App\Creational\AbstractFactory\Interfaces\CheckboxInterface;

class MacCheckbox implements CheckboxInterface
{
    public function render(): string
    {
        return "MacOS Checkbox";
    }

    public function onCheck(): string
    {
        return "MacOS Checkbox checked!";
    }
}
