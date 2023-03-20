<?php

namespace Vasoft\Examples\Command\Services;

use Exception;
use Vasoft\Examples\Command\Contracts\HistoryInterface;

class History implements HistoryInterface
{
    private array $history = [];

    public function save(string $text): void
    {
        $this->history[] = $text;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function get(): string
    {
        if ($this->isEmpty()) {
            throw new Exception('Empty history');
        }
        return end($this->history);
    }

    public function isEmpty(): bool
    {
        return empty($this->history);
    }
}