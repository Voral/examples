<?php

namespace Vasoft\Examples\Command\Contracts;

interface StorageInterface
{
    public function save(string $text): void;

    public function get(): string;
}