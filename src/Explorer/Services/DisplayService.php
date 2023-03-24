<?php

namespace Vasoft\Examples\Explorer\Services;

class DisplayService
{
    public function process(array $collection): void
    {
        foreach ($collection as $item) {
            echo $item;
        }
    }
}