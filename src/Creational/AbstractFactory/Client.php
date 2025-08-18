<?php

namespace App\Creational\AbstractFactory;

use App\Creational\AbstractFactory\Interfaces\GUIFactoryInterface;

class Client
{
    public function __construct(private readonly GUIFactoryInterface $guiFactory)
    {
    }

    public function renderUI(): string
    {
        $button = $this->guiFactory->createButton();
        $checkbox = $this->guiFactory->createCheckbox();

        return $button->render() . "\n" . $checkbox->render();
    }

}
