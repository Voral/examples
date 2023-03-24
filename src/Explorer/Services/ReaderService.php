<?php

namespace Vasoft\Examples\Explorer\Services;

use DirectoryIterator;
use Vasoft\Examples\Explorer\Contracts\ReaderInterface;

class ReaderService implements ReaderInterface
{

    /**
     * @inheritDoc
     */
    public function read(string $path): array
    {
        $iterator = new DirectoryIterator(realpath($path));
        $result = [];
        foreach ($iterator as $fileInfo) {
            $result[] = clone $fileInfo;
        }
        return $result;
    }
}