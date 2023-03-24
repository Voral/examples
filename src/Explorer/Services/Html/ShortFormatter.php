<?php

namespace Vasoft\Examples\Explorer\Services\Html;

class ShortFormatter implements \Vasoft\Examples\Explorer\Contracts\FormatterInterface
{

    public function process(\DirectoryIterator $item): string
    {
        return sprintf(
            "%s <b>%s</b><br>",
            $item->isDir() ? 'D' : ' ',
            $item->getFilename()
        );
    }
}