<?php


use Vasoft\Examples\Sort\Utils\DataGenerator;
use Vasoft\Examples\Sort\Utils\Profiler;
use Vasoft\Examples\Sort\Utils\Sorter;

include '../../vendor/autoload.php';

$data = DataGenerator::getArray(50000);
echo '---Sort', PHP_EOL;
$profiler = new Profiler(Sorter::class);
$profiler
    ->run($data)
    ->echo();
