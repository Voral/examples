<?php

use Vasoft\Examples\Adaptor;

include '../../vendor/autoload.php';

echo (new Adaptor\CircleAdaptor())->circleArea(10), PHP_EOL;
echo (new Adaptor\SquareAdaptor())->squareArea(10), PHP_EOL;

