<?php

namespace Vasoft\Examples\Explorer\Services\Html;

class FullFormatter implements \Vasoft\Examples\Explorer\Contracts\FormatterInterface
{

    public function process(\DirectoryIterator $item): string
    {
        return sprintf(
            "%s %s%s%s %.1f <b>%s</b><br>",
            $item->isDir() ? 'D' : ' ',
            $item->isReadable() ? 'R' : ' ',
            $item->isWritable() ? 'W' : ' ',
            $item->isExecutable() ? 'E' : ' ',
            $item->getSize() / 1024,
            $item->getFilename()
        );
    }
}