<?php

namespace Vasoft\Examples\Command\Commands;

use Vasoft\Examples\Command\Contracts\CommandInterface;
use Vasoft\Examples\Command\Contracts\HistoryInterface;
use Vasoft\Examples\Command\Contracts\LoggerInterface;
use Vasoft\Examples\Command\Contracts\StorageInterface;

class CutCommand implements CommandInterface
{
    public const OFFSET = 'offset';
    public const LENGTH = 'length';

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
        if (isset($props[self::OFFSET], $props[self::LENGTH])) {
            $this->history->save($this->text);
            $this->storage->save(substr($this->text, $props[self::OFFSET], $props[self::LENGTH]));
            $this->text = substr_replace($this->text, '', $props[self::OFFSET], $props[self::LENGTH]);
            $this->logger->log(sprintf('Вырезан текст с позиции %d длиной %d', $props[self::OFFSET], $props[self::LENGTH]));
        }
    }
}