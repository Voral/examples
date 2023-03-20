<?php
namespace Vasoft\Examples\Factory\Contract;
use Vasoft\Examples\Factory\System\Config;

interface DataBaseInterface
{
    public function __construct(Config $config);

    public function getConnection(): DBConnectionInterface;

    public function getQueryBuilder(string $tableName): DBQueryBuilderInterface;
}