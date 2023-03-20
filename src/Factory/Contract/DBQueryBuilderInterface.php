<?php
namespace Vasoft\Examples\Factory\Contract;
interface DBQueryBuilderInterface
{
    public function __construct(string $tableName);

    public function where(string $fieldName, mixed $value, string $operator): static;

    public function addSelect(string $fieldName, string $alias): static;
}