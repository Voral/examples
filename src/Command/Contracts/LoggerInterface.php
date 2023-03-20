<?php

namespace Vasoft\Examples\Command\Contracts;

interface LoggerInterface
{
    public function log(string $text): void;
}