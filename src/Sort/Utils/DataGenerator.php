<?php

namespace Vasoft\Examples\Sort\Utils;

use Exception;

class DataGenerator
{
    /**
     * @param int $count
     * @return array
     * @throws Exception
     */
    public static function getArray(int $count): array
    {
        $maxValue = 2 * $count;
        $result = [];
        for ($i = 0; $i < $count; ++$i) {
            $result[] = random_int(0, $maxValue);
        }
        return $result;
    }

    /**
     * @param int $count
     * @return array
     * @throws Exception
     */
    public static function getArrayAndValue(int $count): array
    {
        $data = self::getArray($count);
        return [
            $data,
            $data[random_int(0, $count - 1)]
        ];
    }
}