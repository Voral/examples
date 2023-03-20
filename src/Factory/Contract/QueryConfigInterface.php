<?php
namespace Vasoft\Examples\Factory\Contract;
interface QueryConfigInterface
{
    public function __construct(string $queryTemplate);

    public function addProperty(string $name, mixed $value): static;
}