<?php

namespace Vasoft\Examples\Sort\Utils;

class Searcher
    implements HasStatInterface
{
    private static int $stepCount = 0;

    /**
     * @title Линейный поиск
     */
    public static function linearSearch(array $myArray, int $num): ?int
    {
        $count = count($myArray);
        for ($i = 0; $i < $count; $i++) {
            ++self::$stepCount;
            if ($myArray[$i] === $num) {
                return $i;
            }
            if ($myArray[$i] > $num) {
                return null;
            }
        }
        return null;
    }

    /**
     * @title Бинарный поиск
     */
    public static function binarySearch(array $myArray, int $num): ?int
    {
        $left = 0;
        $right = count($myArray) - 1;
        while ($left <= $right) {
            ++self::$stepCount;
            $middle = floor(($right + $left) / 2);
            if ($myArray[$middle] === $num) {
                return $middle;
            }
            if ($myArray[$middle] > $num) {
                $right = $middle - 1;
            } elseif ($myArray[$middle] < $num) {
                $left = $middle + 1;
            }
        }
        return null;
    }

    /**
     * @title Интерполяционный поиск
     */
    public static function interpolationSearch(array $myArray, int $num): ?int
    {
        $start = 0;
        $last = count($myArray) - 1;
        while (($start <= $last) && ($num >= $myArray[$start]) && ($num <= $myArray[$last])) {
            ++self::$stepCount;
            $pos = floor($start + (
                    (($last - $start) / ($myArray[$last] - $myArray[$start]))
                    * ($num - $myArray[$start])
                ));
            if ($myArray[$pos] === $num) {
                return $pos;
            }
            if ($myArray[$pos] < $num) {
                $start = $pos + 1;
            } else {
                $last = $pos - 1;
            }
        }
        return null;
    }

    public static function resetStatInfo(): void
    {
        self::$stepCount = 0;
    }

    public static function getStatInfo(): string
    {
        return 'Количество шагов ' . self::$stepCount;
    }
}