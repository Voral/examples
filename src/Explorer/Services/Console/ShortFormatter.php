<?php

namespace Vasoft\Examples\Explorer\Services\Console;

class ShortFormatter implements \Vasoft\Examples\Explorer\Contracts\FormatterInterface
{

    public function process(\DirectoryIterator $item): string
    {
        return sprintf(
            "%s %s\n",
            $item->isDir() ? 'D' : ' ',
            $item->getFilename()
        );
    }
}