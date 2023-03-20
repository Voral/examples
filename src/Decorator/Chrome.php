<?php

namespace Vasoft\Examples\Decorator;

class Chrome implements NotificatorInterface
{

    public function __construct(private readonly ?NotificatorInterface $previous = null)
    {
    }

    public function send(string $message): void
    {
        $this->previous?->send($message);
        echo 'Send chrome notification: ', $message, PHP_EOL;
    }
}