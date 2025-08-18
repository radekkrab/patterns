<?php

namespace App\Creational\AbstractFactory\Windows;

use App\Creational\AbstractFactory\Interfaces\CheckboxInterface;

class WindowsCheckbox implements CheckboxInterface
{
    public function render(): string
    {
        return "Windows Checkbox";
    }

    public function onCheck(): string
    {
        return "Windows Checkbox checked!";
    }
}
