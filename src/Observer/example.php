<?php

use Vasoft\Examples\Observer;

include '../../vendor/autoload.php';

$service = new Observer\JobsService();

$candidate1 = new Observer\Candidate('Billy', 'billy@mk.mk', 20);
$candidate2 = new Observer\Candidate('Max', 'max@mk.mk', 10);

$service->attach($candidate1);
$service->attach($candidate2);

$service->addJob(new Observer\Job('First job'));

$service->detach($candidate2);

$service->addJob(new Observer\Job('Second job'));


