<?php

namespace Vasoft\Examples\Observer;

use SplSubject;
use SplObserver;

class JobsService implements SplSubject
{
    /** @var Job[] */
    private array $jobs = [];

    /** @var SplObserver[] */
    private array $observers = [];
    private ?Job $lastAdded = null;

    public function addJob(Job $job): void
    {
        $index = count($this->jobs);
        $this->jobs[$index] = $job;
        $this->lastAdded = &$this->jobs[$index];
        $this->notify();
    }


    /**
     * @inheritDoc
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers[$this->getIndex($observer)] = $observer;
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer): void
    {
        $index = $this->getIndex($observer);
        if (array_key_exists($index, $this->observers)) {
            unset($this->observers[$index]);
        }
    }

    /**
     * @inheritDoc
     */
    public function notify(): void
    {
        array_walk($this->observers, fn(SplObserver $observer) => $observer->update($this));
    }

    private function getIndex(SplObserver $observer): int
    {
        return spl_object_id($observer);
    }

    /**
     * @return array
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * @return Job|null
     */
    public function getLastAdded(): ?Job
    {
        return $this->lastAdded;
    }
}