<?php

namespace App\Creational\Singleton;

use Exception;

class Logger
{
    private static ?\App\Creational\Singleton\Logger $instance = null;
    private array $logs = [];

    // Приватный конструктор предотвращает создание через new
    private function __construct() {}

    // Предотвращаем клонирование
    private function __clone() {}

    // Предотвращаем десериализацию
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    // Единственный способ получить экземпляр
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Методы бизнес-логики
    public function log(string $message): void
    {
        $this->logs[] = [
            'timestamp' => date('Y-m-d H:i:s'),
            'message' => $message
        ];
    }

    public function getLogs(): array
    {
        return $this->logs;
    }

    public function clearLogs(): void
    {
        $this->logs = [];
    }

}