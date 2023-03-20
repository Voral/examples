<?php

namespace Vasoft\Examples\Strategy\Contracts;
interface PayMethodInterface
{
    public function pay(float $sum, string $phone): bool;
}