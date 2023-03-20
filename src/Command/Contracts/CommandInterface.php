<?php

namespace Vasoft\Examples\Command\Contracts;

use Vasoft\Examples\Services\Clipboard;

interface CommandInterface
{
    public function __construct(
        string &$text,
        StorageInterface $storage,
        LoggerInterface $logger,
        HistoryInterface $history
    );

    public function execute(array $props = []): void;
}