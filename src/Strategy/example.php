<?php


use Vasoft\Examples\Strategy\Payments\PaymentManager;
use Vasoft\Examples\Strategy\Payments\QiwiPayment;
use Vasoft\Examples\Strategy\Payments\WebMoneyPayment;
use Vasoft\Examples\Strategy\Payments\YandexPayment;

include '../../vendor/autoload.php';

$manger = new PaymentManager([
    QiwiPayment::CODE => QiwiPayment::class,
    YandexPayment::CODE => YandexPayment::class,
    WebMoneyPayment::CODE => WebMoneyPayment::class,
]);

$manger->get(WebMoneyPayment::CODE)->pay(1200, '+711111112');

$manger->get(QiwiPayment::CODE)->pay(100, '+711111111');