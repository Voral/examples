<?php

namespace Vasoft\Examples\Command\Contracts;

interface HistoryInterface
{
    public function save(string $text): void;

    public function get(): string;

    public function isEmpty(): bool;

}