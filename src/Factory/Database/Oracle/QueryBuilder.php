<?php

namespace Vasoft\Examples\Factory\Database\Oracle;


use Vasoft\Examples\Factory\Contract\DBQueryBuilderInterface;

class QueryBuilder implements DBQueryBuilderInterface
{

    public function __construct(public readonly string $tableName)
    {
    }

    public function where(string $fieldName, mixed $value, string $operator): static
    {
        return $this;
    }

    public function addSelect(string $fieldName, string $alias): static
    {
        return $this;
    }
}