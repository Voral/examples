<?php

namespace Vasoft\Examples\Command\Commands;

use Vasoft\Examples\Command\Contracts\CommandInterface;
use Vasoft\Examples\Command\Contracts\HistoryInterface;
use Vasoft\Examples\Command\Contracts\LoggerInterface;
use Vasoft\Examples\Command\Contracts\StorageInterface;

class PasteCommand implements CommandInterface
{
    public const INSERT_TO = 'insetTo';

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
        if (isset($props[self::INSERT_TO])) {
            $this->history->save($this->text);
            echo $this->storage->get(),PHP_EOL;

            $this->text = substr_replace($this->text, $this->storage->get(), $props[self::INSERT_TO], 0);
            $this->logger->log('Вставлен текст из хранилища в позицию ' . $props[self::INSERT_TO]);
        }
    }
}