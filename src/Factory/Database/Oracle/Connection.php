<?php

namespace Vasoft\Examples\Factory\Database\Oracle;

use Vasoft\Examples\Factory\Contract\DBConnectionInterface;
use Vasoft\Examples\Factory\Contract\DBRecordInterface;
use Vasoft\Examples\Factory\Contract\QueryConfigInterface;

class Connection implements DBConnectionInterface
{

    public function __construct(
        private readonly array $property
    )
    {
        /// подключение к конкретной бд
    }

    public function query(QueryConfigInterface $config): ?array
    {
        // выполнение запроса
        return [];
    }

    public function queryOnce(QueryConfigInterface $config): DBRecordInterface
    {
        return new Record(1, ['test' => 'example']);
    }
}