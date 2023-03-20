<?php

namespace Vasoft\Examples\Strategy\Payments;

use Vasoft\Examples\Strategy\Contracts\PayMethodInterface;

abstract class Payment implements PayMethodInterface
{

    public function pay(float $sum, string $phone): bool
    {
        echo static::class, ' ', $sum, ' ', $phone, PHP_EOL;
        // Запрос и обработка ответа
        return true;
    }
}