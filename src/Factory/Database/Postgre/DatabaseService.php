<?php

namespace Vasoft\Examples\Factory\Database\Postgre;

use Vasoft\Examples\Factory\Contract\DataBaseInterface;
use Vasoft\Examples\Factory\Contract\DBConnectionInterface;
use Vasoft\Examples\Factory\Contract\DBQueryBuilderInterface;
use Vasoft\Examples\Factory\System\Config;

class DatabaseService implements DataBaseInterface
{
    private ?DBConnectionInterface $connection = null;
    /** @var DBQueryBuilderInterface[] */
    private array $builders = [];

    public function getConnection(): DBConnectionInterface
    {
        if (!$this->connection) {
            $this->connection = new Connection($this->config->load(self::class));
        }
        return $this->connection;
    }

    public function getQueryBuilder(string $tableName): DBQueryBuilderInterface
    {
        if (!array_key_exists($tableName, $this->builders)) {
            $this->builders[$tableName] = new QueryBuilder($tableName);
        }
        return $this->builders[$tableName];
    }

    public function __construct(
        private readonly Config $config
    )
    {

    }
}