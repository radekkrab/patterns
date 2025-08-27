<?php

namespace App\Creational\Prototype;

interface PrototypeInterface
{
    public function clone(): self;
    public function getTitle(): string;
    public function setTitle(string $title): void;
    public function getContent(): string;
    public function setContent(string $content): void;
}