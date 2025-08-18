<?php

namespace Tests\Creational\FactoryMethod;

use PHPUnit\Framework\TestCase;
use App\Creational\FactoryMethod\Creators\SeaLogistics;
use App\Creational\FactoryMethod\Creators\RoadLogistics;

use function App\Creational\FactoryMethod\factoryMethod;

class FactoryMethodTest extends TestCase
{
    public function testFactoryMethodWithTruck(): void
    {
        $logistics = new RoadLogistics();
        $result = factoryMethod($logistics);

        $this->assertEquals("Груз доставлен по дороге (грузовик)", $result);
    }

    public function testFactoryMethodWithShip(): void
    {
        $logistics = new SeaLogistics();
        $result = factoryMethod($logistics);

        $this->assertEquals("Груз доставлен морем (корабль)", $result);
    }
}
