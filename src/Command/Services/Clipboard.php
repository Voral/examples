<?php

namespace Vasoft\Examples\Command\Services;



use Vasoft\Examples\Command\Contracts\StorageInterface;

class Clipboard implements  StorageInterface
{
    private string $text = '';

    public function save(string $text): void
    {
        $this->text = $text;
    }

    public function get(): string
    {
        return $this->text;
    }
}