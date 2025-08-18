<?php

require __DIR__ . '/vendor/autoload.php';

use App\Creational\FactoryMethod\Creators\RoadLogistics;
use App\Creational\FactoryMethod\Creators\SeaLogistics;
use function App\Creational\FactoryMethod\factoryMethod;

// Фабричный метод, создаём объекты через абстрактный класс используя подклассы

echo "Доставка по дороге:\n";
echo factoryMethod(new RoadLogistics()) . "\n";

echo "\nДоставка морем:\n";
echo factoryMethod(new SeaLogistics()) . "\n";
