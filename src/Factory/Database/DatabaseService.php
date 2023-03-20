<?php

namespace Vasoft\Examples\Factory\Database;

use Vasoft\Examples\Factory\Contract\DataBaseInterface;
use Vasoft\Examples\Factory\Database\MySql;

class DatabaseService
{
    public const MYSQL = 'mysql';
    public const POSTGRE = 'postgre';
    public const ORACLE = 'oracle';

    private array $drivers = [
        self::MYSQL => MySql\DatabaseService::class,
        self::POSTGRE => Postgre\DatabaseService::class,
        self::ORACLE => Oracle\DatabaseService::class,
    ];
    private array $db = [];

    public function register(string $type, string $className): void
    {
        $this->drivers[$type] = $className;
    }

    public function get(string $type): DataBaseInterface
    {
        if (!array_key_exists($type, $this->db)) {
            $this->db[$type] = $this->init($type);
        }
        return $this->db[$type];
    }

    public function init(string $type): DataBaseInterface
    {
        if (!array_key_exists($type, $this->drivers)) {
            throw new \Exception('Unknown DB type ' . $type);
        }
        return new ($this->drivers[$type])();
    }

}