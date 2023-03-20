<?php

namespace Vasoft\Examples\Command\Commands;

use Vasoft\Examples\Command\Contracts\CommandInterface;
use Vasoft\Examples\Command\Contracts\HistoryInterface;
use Vasoft\Examples\Command\Contracts\LoggerInterface;
use Vasoft\Examples\Command\Contracts\StorageInterface;

class UndoCommand implements CommandInterface
{
    public function __construct(
        private string                    &$text,
        private readonly StorageInterface $storage,
        private readonly LoggerInterface  $logger,
        private readonly HistoryInterface $history
    )
    {
    }

    public function execute(array $props = []): void
    {
        if (!$this->history->isEmpty()) {
            $this->text = $this->history->get();
        }
    }
}