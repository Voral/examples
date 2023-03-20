<?php
namespace Vasoft\Examples\Factory\Contract;
interface DBConnectionInterface
{
    public function __construct(array $property);

    public function query(QueryConfigInterface $config): ?array;
    public function queryOnce(QueryConfigInterface $config): DBRecordInterface;
}