<?php

namespace Vasoft\Examples\Explorer\Services\Console;

use Vasoft\Examples\Explorer\Enums\DisplayType;
use Vasoft\Examples\Explorer\Contracts\FormatterFactoryInterface;
use Vasoft\Examples\Explorer\Contracts\FormatterInterface;

class FormatterFactory implements FormatterFactoryInterface
{
    public function get(DisplayType $displayType): FormatterInterface
    {
        return match ($displayType) {
            DisplayType::SHORT => new ShortFormatter(),
            DisplayType::FULL => new FullFormatter()
        };
    }
}