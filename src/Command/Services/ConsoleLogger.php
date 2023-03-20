<?php

namespace Vasoft\Examples\Command\Services;


use Vasoft\Examples\Command\Contracts\LoggerInterface;

class ConsoleLogger implements LoggerInterface
{

    public function log(string $text): void
    {
        echo $text, PHP_EOL;
    }
}