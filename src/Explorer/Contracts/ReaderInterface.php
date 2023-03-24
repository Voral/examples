<?php

namespace Vasoft\Examples\Explorer\Contracts;

use DirectoryIterator;

interface ReaderInterface
{
    /**
     * @param string $path
     * @return DirectoryIterator[]
     */
    public function read(string $path): array;
}