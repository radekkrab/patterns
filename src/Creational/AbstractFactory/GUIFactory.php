<?php

namespace App\Creational\AbstractFactory;

use InvalidArgumentException;
use App\Creational\AbstractFactory\Interfaces\ButtonInterface;
use App\Creational\AbstractFactory\Interfaces\CheckboxInterface;
use App\Creational\AbstractFactory\Interfaces\GUIFactoryInterface;
use App\Creational\AbstractFactory\MacOS\{MacButton, MacCheckbox};
use App\Creational\AbstractFactory\Windows\{WindowsButton, WindowsCheckbox};

class GUIFactory
{
    public static function createFactory(string $osType): GUIFactoryInterface
    {
        return match (strtolower($osType)) {
            'windows' => new class () implements GUIFactoryInterface {
                public function createButton(): ButtonInterface
                {
                    return new WindowsButton();
                }
                public function createCheckbox(): CheckboxInterface
                {
                    return new WindowsCheckbox();
                }
            },
            'macos' => new class () implements GUIFactoryInterface {
                public function createButton(): ButtonInterface
                {
                    return new MacButton();
                }
                public function createCheckbox(): CheckboxInterface
                {
                    return new MacCheckbox();
                }
            },
            default => throw new InvalidArgumentException("Unsupported OS type: $osType"),
        };
    }

}
