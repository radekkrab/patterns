<?php

namespace App\Creational\Prototype;

use App\Creational\Prototype\PrototypeInterface;

class AnotherPrototype implements PrototypeInterface
{
    private string $title;
    private string $content;
    private array $tags;

    public function __construct(string $title, string $content, array $tags = [])
    {
        $this->title = $title;
        $this->content = $content;
        $this->tags = $tags;
    }

    public function clone(): self
    {
        // Глубокое копирование массива тегов
        $clone = new self($this->title, $this->content, $this->tags);
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

    public function getTags(): array
    {
        return $this->tags;
    }

    public function addTag(string $tag): void
    {
        $this->tags[] = $tag;
    }

    public function __toString(): string
    {
        return sprintf(
            "Title: %s\nContent: %s\nTags: %s",
            $this->title,
            $this->content,
            implode(', ', $this->tags)
        );
    }
}