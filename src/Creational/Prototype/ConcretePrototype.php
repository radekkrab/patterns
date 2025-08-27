<?php

namespace App\Creational\Prototype;

use App\Creational\Prototype\PrototypeInterface;

class ConcretePrototype implements PrototypeInterface
{
    private string $title;
    private string $content;
    private \DateTime $createdAt;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = new \DateTime();
    }

    public function clone(): self
    {
        // Создаем новый объект с теми же данными
        $clone = new self($this->title, $this->content);

        // Копируем все свойства (можно добавить дополнительные свойства)
        $clone->createdAt = clone $this->createdAt;

        return $clone;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function __toString(): string
    {
        return sprintf(
            "Title: %s\nContent: %s\nCreated: %s",
            $this->title,
            $this->content,
            $this->createdAt->format('Y-m-d H:i:s')
        );
    }
}