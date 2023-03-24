<?php

namespace Vasoft\Examples\Explorer\Services\Console;

use DirectoryIterator;
use Vasoft\Examples\Explorer\Contracts\FormatterInterface;

class FullFormatter implements FormatterInterface
{

    public function process(DirectoryIterator $item): string
    {
        if ($item->isDir()) {
            $executeSymbol =  'S';
            $size = '          ';
        }  else {
            $executeSymbol = 'E';
            $size = sprintf('%10.2f',$item->getSize() / 1024);
        }
        return sprintf(
            "%s %s%s%s %s %s\n",
            $item->isDir() ? 'D' : ' ',
            $item->isReadable() ? 'R' : ' ',
            $item->isWritable() ? 'W' : ' ',
            $item->isExecutable() ? $executeSymbol : ' ',
            $size,
            $item->getFilename()
        );
    }
}