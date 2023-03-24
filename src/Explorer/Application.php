<?php

namespace Vasoft\Examples\Explorer;

use Vasoft\Examples\Explorer\Enums\DisplayType;
use Vasoft\Examples\Explorer\Enums\SortType;
use Vasoft\Examples\Explorer\Contracts\FormatterFactoryInterface;
use Vasoft\Examples\Explorer\Contracts\ReaderInterface;
use Vasoft\Examples\Explorer\Services\DisplayService;
use Vasoft\Examples\Explorer\Services\SortService;

class Application
{
    public function __construct(
        private readonly FormatterFactoryInterface $formatterFactory,
        private readonly ReaderInterface           $reader,
        private readonly SortService               $sortService,
        private readonly DisplayService            $displayService,
    )
    {
    }

    public function show(
        string      $path,
        SortType    $sortType = SortType::NAME,
        DisplayType $displayType = DisplayType::FULL,
        bool        $directoryFirst = true
    ): void
    {
        $collection = $this->reader->read($path);
        $sortedCollection = $this->sortService->sort($collection, $sortType, $directoryFirst);
        $formatter = $this->formatterFactory->get($displayType);
        $formattedCollection = array_map([$formatter, 'process'], $sortedCollection);
        $this->displayService->process($formattedCollection);
    }
}