<?php

namespace Vasoft\Examples\Explorer\Enums;

enum SortType
{
    case NAME;
    case EXTENSION;
    case SIZE;
    case TIME_CHANGE;
    case TIME_MODIFY;
    case TIME_ACCESS;

    public function sort(): \Closure
    {
        return match ($this) {
            self::NAME => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getFilename() <=> $b->getFilename(),
            self::EXTENSION => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getExtension() <=> $b->getExtension(),
            self::SIZE => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getSize() <=> $b->getSize(),
            self::TIME_CHANGE => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getCTime() <=> $b->getCTime(),
            self::TIME_MODIFY => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getMTime() <=> $b->getMTime(),
            self::TIME_ACCESS => static fn(\DirectoryIterator $a, \DirectoryIterator $b) => $a->getATime() <=> $b->getATime(),
        };
    }
}