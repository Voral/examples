<?php

namespace Vasoft\Examples\Sort\Utils;

final class Sorter
{
    /**
     * @title Сортировка пузырьком
     */
    public static function bubbleSort(array $array): array
    {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($array[$i] > $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $temp;
                }
            }
        }
        return $array;
    }

    /**
     * @title Шейкерная сортировка
     */
    public static function shakerSort(array $array): array
    {
        $n = count($array);
        $left = 0;
        $right = $n - 1;
        do {
            for ($i = $left; $i < $right; $i++) {
                $iPair = $i + 1;
                if ($array[$i] > $array[$iPair]) {
                    $temp = $array[$iPair];
                    $array[$iPair] = $array[$i];
                    $array[$i] = $temp;
                }
            }
            --$right;
            for ($i = $right; $i > $left; $i--) {
                $iPair = $i - 1;
                if ($array[$i] < $array[$iPair]) {
                    $temp = $array[$iPair];
                    $array[$iPair] = $array[$i];
                    $array[$i] = $temp;
                }
            }
            ++$left;
        } while ($left <= $right);
        return $array;
    }
}