<?php

use Vasoft\Examples\Explorer\Application;
use Vasoft\Examples\Explorer\Enums\DisplayType;
use Vasoft\Examples\Explorer\Enums\SortType;
use Vasoft\Examples\Explorer\Services\Console;
use Vasoft\Examples\Explorer\Services\Html;
use Vasoft\Examples\Explorer\Services\DisplayService;
use Vasoft\Examples\Explorer\Services\ReaderService;
use Vasoft\Examples\Explorer\Services\SortService;

include '../../vendor/autoload.php';

$app = new Application(
    new Console\FormatterFactory(),
    new ReaderService(),
    new SortService(),
    new DisplayService()
);

$app->show('./');
echo '--------------------',PHP_EOL;
$app->show('./', SortType::SIZE);
echo '--------------------',PHP_EOL;
$app->show('./', SortType::SIZE, DisplayType::SHORT);
echo '--------------------',PHP_EOL;
$app->show('./', SortType::SIZE, DisplayType::SHORT,false);

$app = new Application(
    new Html\FormatterFactory(),
    new ReaderService(),
    new SortService(),
    new DisplayService()
);
echo '--------------------',PHP_EOL;
$app->show('./', SortType::SIZE, DisplayType::SHORT);
