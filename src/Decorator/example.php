<?php
use Vasoft\Examples\Decorator\Chrome;
use Vasoft\Examples\Decorator\Email;
use Vasoft\Examples\Decorator\Sms;

include '../../vendor/autoload.php';

$notifySmsEmail = new Sms(new Email());
$notifySmsEmailChrome = new Sms(new Email(new Chrome()));

$notifySmsEmail->send('First');
$notifySmsEmailChrome->send('Second');
