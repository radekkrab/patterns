<?php

require __DIR__ . '/vendor/autoload.php';

use App\Creational\AbstractFactory\GUIFactory;
use App\Creational\AbstractFactory\Client;
use App\Creational\FactoryMethod\Creators\RoadLogistics;
use App\Creational\FactoryMethod\Creators\SeaLogistics;
use App\Creational\Builder\Builder\Director;
use App\Creational\Builder\Builder\CarBuilder;
use App\Creational\Builder\Builder\CarManualBuilder;
use App\Creational\Singleton\Logger;
use App\Creational\Prototype\AnotherPrototype;
use App\Creational\Prototype\ConcretePrototype;
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

// Синглтон, один объект

// Получаем экземпляр Singleton
$logger1 = Logger::getInstance();
$logger2 = Logger::getInstance();

// Проверяем, что это один и тот же объект
if ($logger1 === $logger2) {
    echo "✓ Это один и тот же экземпляр Logger\n";
} else {
    echo "✗ Это разные экземпляры\n";
}

// Используем логгер
$logger1->log("Первое сообщение");
$logger2->log("Второе сообщение");

// Получаем логи (можно через любой экземпляр)
$logs = $logger1->getLogs();

echo "Логи:\n";
foreach ($logs as $log) {
    echo "[{$log['timestamp']}] {$log['message']}\n";
}

// Прототип, создание объекта через clone

echo "=== Демонстрация паттерна Прототип ===\n\n";

// Создаем оригинальный объект
$original = new ConcretePrototype(
    "Первая статья",
    "Это содержание оригинальной статьи"
);

echo "Оригинальный объект:\n";
echo $original . "\n";
echo "Время создания: " . $original->getCreatedAt()->format('H:i:s.u') . "\n\n";

// Клонируем объект
$clone = $original->clone();

echo "Клонированный объект:\n";
echo $clone . "\n";
echo "Время создания: " . $clone->getCreatedAt()->format('H:i:s.u') . "\n\n";

// Модифицируем клон
$clone->setTitle("Клонированная статья");
$clone->setContent("Это модифицированное содержание");

echo "Модифицированный клон:\n";
echo $clone . "\n\n";

echo "Оригинал после модификации клона:\n";
echo $original . "\n\n";

// Демонстрация с другим прототипом
echo "=== Другой тип прототипа ===\n\n";

$articleWithTags = new AnotherPrototype(
    "Статья с тегами",
    "Содержание статьи с тегами",
    ['php', 'design-patterns', 'prototype']
);

echo "Оригинал с тегами:\n";
echo $articleWithTags . "\n\n";

$articleClone = $articleWithTags->clone();
$articleClone->addTag('clone');

echo "Клон с добавленным тегом:\n";
echo $articleClone . "\n\n";

echo "Оригинал после модификации клона:\n";
echo $articleWithTags . "\n\n";