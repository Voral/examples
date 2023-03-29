<?php

namespace Vasoft\Examples\Sort\Utils;

interface HasStatInterface
{
    public static function resetStatInfo(): void;

    public static function getStatInfo(): string;

}