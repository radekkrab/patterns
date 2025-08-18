<?php

namespace App\Creational\FactoryMethod;

use App\Creational\FactoryMethod\Creators\Logistics;

/**
 *  Выполняет доставку через указанный логистический сервис
 *
 * @param Logistics $logistics Объект логистики (фабрика транспорта)
 * @return string Результат доставки
 */
function factoryMethod(Logistics $logistics): string
{
    return $logistics->planDelivery();
}
