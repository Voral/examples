<?php

namespace Vasoft\Examples\Explorer\Contracts;

use Vasoft\Examples\Explorer\Enums\DisplayType;

interface FormatterFactoryInterface
{
    public function get(DisplayType $displayType): FormatterInterface;
}