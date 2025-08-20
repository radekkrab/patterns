<?php

namespace App\Creational\AbstractFactory;

use InvalidArgumentException;
use App\Creational\AbstractFactory\Interfaces\GUIFactoryInterface;
use App\Creational\AbstractFactory\MacOS\MacFactory;
use App\Creational\AbstractFactory\Windows\WindowsFactory;

class GUIFactory
{
    public static function createFactory(string $osType): GUIFactoryInterface
    {
        return match (strtolower($osType)) {
            'windows' => new WindowsFactory(),
            'macos' => new MacFactory(),
            default => throw new InvalidArgumentException("Unsupported OS type: $osType"),
        };
    }

}
