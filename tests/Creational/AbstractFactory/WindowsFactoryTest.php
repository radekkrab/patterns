<?php

namespace Tests\Creational\AbstractFactory;

use App\Creational\AbstractFactory\Windows\WindowsButton;
use App\Creational\AbstractFactory\Windows\WindowsCheckbox;
use App\Creational\AbstractFactory\Windows\WindowsFactory;
use PHPUnit\Framework\TestCase;

class WindowsFactoryTest extends TestCase
{
    public function testCreatesWindowsElements(): void
    {
        $factory = new WindowsFactory();
        $this->assertInstanceOf(WindowsButton::class, $factory->createButton());
        $this->assertInstanceOf(WindowsCheckbox::class, $factory->createCheckbox());
    }
}
