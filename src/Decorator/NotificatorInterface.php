<?php

namespace Vasoft\Examples\Decorator;

interface NotificatorInterface
{
    public function __construct(?NotificatorInterface $previous);

    public function send(string $message): void;
}