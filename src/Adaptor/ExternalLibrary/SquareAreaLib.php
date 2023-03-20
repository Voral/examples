<?php
namespace Vasoft\Examples\Adaptor\ExternalLibrary;
class SquareAreaLib
{
    public function getSquareArea(float $diagonal): float
    {
        return ($diagonal ** 2) / 2;
    }
}