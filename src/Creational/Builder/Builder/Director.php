<?php

namespace App\Creational\Builder\Builder;

class Director
{
    public function constructSportsCar(BuilderInterface $builder): void
    {
        $builder->reset();
        $builder->setModel('Sports Car');
        $builder->setEngine('V8', 450);
        $builder->setSeats(2, 'leather', true);
        $builder->setGPS(true, true);
        $builder->addExtra('Sport suspension');
        $builder->addExtra('Racing stripes');
    }

    public function constructFamilyCar(BuilderInterface $builder): void
    {
        $builder->reset();
        $builder->setModel('Family Car');
        $builder->setEngine('V6', 250);
        $builder->setSeats(7, 'fabric');
        $builder->setGPS(true);
        $builder->addExtra('Roof rack');
        $builder->addExtra('Child safety locks');
    }

    public function constructCityCar(BuilderInterface $builder): void
    {
        $builder->reset();
        $builder->setModel('City Car');
        $builder->setEngine('Electric', 150);
        $builder->setSeats(4, 'vegan leather');
        $builder->setGPS(true, true);
        $builder->addExtra('Parking sensors');
        $builder->addExtra('Backup camera');
    }
}
