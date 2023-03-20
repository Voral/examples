<?php

namespace Vasoft\Examples\Observer;

use SplSubject;

class Candidate implements \SplObserver
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly int    $experience
    )
    {

    }

    public function update(SplSubject $subject): void
    {
        if (!$subject instanceof JobsService) {
            return;
        }
        $newJob = $subject->getLastAdded();
        if ($newJob) {
            echo sprintf(
                'Send email to %s<%s> about new job add with title: %s',
                $this->name,
                $this->email,
                $newJob->title),
            PHP_EOL;
        }
    }
}