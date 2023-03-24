<?php

namespace Vasoft\Examples\Explorer\Services;

use Vasoft\Examples\Explorer\Enums\SortType;

class SortService
{
    public function sort(array $collection, SortType $sortType, bool $directoryFirst = true): array
    {
        if ($directoryFirst) {
            $sortFunction = $sortType->sort();
            usort($collection, static function (\DirectoryIterator $a, \DirectoryIterator $b) use ($sortFunction) {
                if ($a->isDir() && $b->isDir()) {
                    if (($a->isDot() && $b->isDot()) || (!$a->isDot() && !$b->isDot())) {
                        return $sortFunction($a, $b);
                    }
                    return $a->isDot() ? -1 : 1;
                }
                if (!$a->isDir() && !$b->isDir()) {
                    return $sortFunction($a, $b);
                }
                if ($a->isDir()) {
                    return -1;
                }
                return 1;
            });
        } else {
            usort($collection, $sortType->sort());
        }
        return $collection;
    }
}