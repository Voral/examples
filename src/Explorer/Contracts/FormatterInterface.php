<?php

namespace Vasoft\Examples\Explorer\Contracts;

interface FormatterInterface
{
    public function process(\DirectoryIterator $item): string;
}