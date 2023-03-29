<?php


use Vasoft\Examples\Sort\Utils\DataGenerator;
use Vasoft\Examples\Sort\Utils\Profiler;
use Vasoft\Examples\Sort\Utils\Searcher;
use Vasoft\Examples\Sort\Utils\Sorter;

include '../../vendor/autoload.php';

[$data, $searchValue] = DataGenerator::getArrayAndValue(10000);
echo '---Sort', PHP_EOL;
$data = Sorter::bubbleSort($data);
echo '---Search', PHP_EOL;
$profiler = new Profiler(Searcher::class);
$profiler
    ->run($data, $searchValue)
    ->echo();
