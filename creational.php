<?php

require __DIR__ . '/vendor/autoload.php';

use App\Creational\AbstractFactory\GUIFactory;
use App\Creational\AbstractFactory\Client;
use App\Creational\FactoryMethod\Creators\RoadLogistics;
use App\Creational\FactoryMethod\Creators\SeaLogistics;
use App\Creational\Builder\Builder\Director;
use App\Creational\Builder\Builder\CarBuilder;
use App\Creational\Builder\Builder\CarManualBuilder;
use function App\Creational\FactoryMethod\factoryMethod;

// Фабричный метод, создаём объекты через абстрактный класс используя подклассы

echo "Доставка по дороге:\n";
echo factoryMethod(new RoadLogistics()) . "\n";

echo "\nДоставка морем:\n";
echo factoryMethod(new SeaLogistics()) . "\n";

// Абстрактная фабрика, создаём через абстрактную фабрику нужные фабрики для создания групп связанных объектов,

$windowsFactory = GUIFactory::createFactory('windows');
$windowsClient = new Client($windowsFactory);
echo $windowsClient->renderUI() . "\n";

$macFactory = GUIFactory::createFactory('macos');
$macClient = new Client($macFactory);
echo $macClient->renderUI() . "\n";

// Билдер, собираем объекты через цепочку вызовов

// Создаем директора
$director = new Director();

// Строим спортивную машину
$carBuilder = new CarBuilder();
$director->constructSportsCar($carBuilder);
$sportsCar = $carBuilder->getResult();

echo "=== SPORTS CAR ===\n";
echo $sportsCar . "\n\n";

// Строим руководство для спортивной машины
$manualBuilder = new CarManualBuilder();
$director->constructSportsCar($manualBuilder);
$sportsCarManual = $manualBuilder->getResult();

echo "=== SPORTS CAR MANUAL ===\n";
echo $sportsCarManual . "\n\n";

// Строим семейную машину
$director->constructFamilyCar($carBuilder);
$familyCar = $carBuilder->getResult();

echo "=== FAMILY CAR ===\n";
echo $familyCar . "\n\n";

// Строим городскую машину
$director->constructCityCar($carBuilder);
$cityCar = $carBuilder->getResult();

echo "=== CITY CAR ===\n";
echo $cityCar . "\n\n";