<?php
namespace Vasoft\Examples\Adaptor;
use Vasoft\Examples\Adaptor\Contracts\ICircle;
use Vasoft\Examples\Adaptor\ExternalLibrary;

class CircleAdaptor implements ICircle
{

    public function circleArea(float $circumference): float
    {
        return (new ExternalLibrary\CircleAreaLib())->getCircleArea($circumference / M_PI);
    }
}