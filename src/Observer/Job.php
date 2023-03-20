<?php

namespace Vasoft\Examples\Observer;

class Job
{
    public function __construct(
        public readonly string $title
    )
    {
    }
}