<?php

namespace Vasoft\Examples\Decorator;

class Email implements NotificatorInterface
{
    public function __construct(private readonly ?NotificatorInterface $previous = null)
    {
    }

    public function send(string $message): void
    {
        $this->previous?->send($message);
        echo 'Email send: ', $message, PHP_EOL;
    }
}