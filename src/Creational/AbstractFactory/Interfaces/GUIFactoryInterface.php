<?php

namespace App\Creational\AbstractFactory\Interfaces;

interface GUIFactoryInterface
{
    public function createButton(): ButtonInterface;
    public function createCheckbox(): CheckboxInterface;
}
