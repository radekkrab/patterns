<?php

namespace App\Creational\AbstractFactory\Interfaces;

interface CheckboxInterface
{
    public function render(): string;
    public function onCheck(): string;
}
