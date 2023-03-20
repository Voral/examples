<?php

namespace Vasoft\Examples\Decorator;

class Sms implements NotificatorInterface
{

    public function __construct(private readonly ?NotificatorInterface $previous = null)
    {
    }

    public function send(string $message): void
    {
        $this->previous?->send($message);
        echo 'Send sms: ', $message, PHP_EOL;
    }
}