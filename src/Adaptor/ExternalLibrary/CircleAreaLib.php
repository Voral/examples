<?php

namespace Vasoft\Examples\Adaptor\ExternalLibrary;
class CircleAreaLib
{
    public function getCircleArea(float $diagonal): float
    {
        return (M_PI * $diagonal ** 2) / 4;
    }
}