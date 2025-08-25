<?php

namespace App\Creational\Builder\Product;

use Stringable;
use App\Creational\Builder\Components\Engine;
use App\Creational\Builder\Components\GPS;
use App\Creational\Builder\Components\Seats;

class Manual implements Stringable
{
    private string $engineInstructions;
    private string $seatsInstructions;
    private string $gpsInstructions;
    private array $extraInstructions = [];

    public function __construct(private readonly string $model)
    {
    }

    public function setEngineInstructions(Engine $engine): void
    {
        $this->engineInstructions = "This car has a {$engine->getType()} engine with {$engine->getPower()} HP. 
        Regular maintenance is required every 10,000 km.";
    }

    public function setSeatsInstructions(Seats $seats): void
    {
        $heatingInfo = $seats->hasHeating() ? " Heated seats should be used with caution." : "";
        $this->seatsInstructions = "The car has {$seats->getCount()} {$seats->getMaterial()} seats.{$heatingInfo}";
    }

    public function setGPSInstructions(?GPS $gps): void
    {
        if ($gps) {
            $features = [];
            if ($gps->hasNavigation()) {
                $features[] = "navigation system";
            }
            if ($gps->hasTrafficUpdates()) {
                $features[] = "real-time traffic updates";
            }

            $this->gpsInstructions = "GPS system includes: " . implode(", ", $features) . ".";
        } else {
            $this->gpsInstructions = "No GPS system installed.";
        }
    }

    public function addExtraInstruction(string $extra): void
    {
        $this->extraInstructions[] = "Instruction for {$extra}: Refer to separate manual.";
    }

    public function __toString(): string
    {
        $instructions = [
            "=== MANUAL FOR {$this->model} ===",
            "ENGINE: {$this->engineInstructions}",
            "SEATS: {$this->seatsInstructions}",
            "GPS: {$this->gpsInstructions}",
        ];

        if ($this->extraInstructions !== []) {
            $instructions[] = "EXTRAS:";
            foreach ($this->extraInstructions as $instruction) {
                $instructions[] = "  - {$instruction}";
            }
        }

        return implode("\n", $instructions);
    }
}
