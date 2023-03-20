<?php
namespace Vasoft\Examples\Adaptor;

use Vasoft\Examples\Adaptor\Contracts\ISquare;
use Vasoft\Examples\Adaptor\ExternalLibrary;

class SquareAdaptor
    implements ISquare
{

    public function squareArea(float $sideSquare): float
    {
        $diagonal = sqrt(2 * ($sideSquare ** 2));
        return (new ExternalLibrary\SquareAreaLib())->getSquareArea($diagonal);
    }
}