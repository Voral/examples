<?php

use Vasoft\Examples\Factory\Database\DatabaseService;

include '../../vendor/autoload.php';

$service = new DatabaseService();
$database = $service->get(DatabaseService::MYSQL);
$connection = $database->getConnection();
$queryBuilder = $database->getQueryBuilder('books');