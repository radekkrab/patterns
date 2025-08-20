<?php

namespace Tests\Creational\AbstractFactory;

use App\Creational\AbstractFactory\MacOS\MacButton;
use App\Creational\AbstractFactory\MacOS\MacCheckbox;
use App\Creational\AbstractFactory\MacOS\MacFactory;
use PHPUnit\Framework\TestCase;

class MacFactoryTest extends TestCase
{
    public function testCreatesMacElements(): void
    {
        $factory = new MacFactory();
        $this->assertInstanceOf(MacButton::class, $factory->createButton());
        $this->assertInstanceOf(MacCheckbox::class, $factory->createCheckbox());
    }
}
