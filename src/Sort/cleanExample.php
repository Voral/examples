<?php


use Vasoft\Examples\Sort\Utils\DataGenerator;
use Vasoft\Examples\Sort\Utils\Searcher;
use Vasoft\Examples\Sort\Utils\Sorter;

include '../../vendor/autoload.php';

[$data, $searchValue] = DataGenerator::getArrayAndValue(10);
$data = Sorter::bubbleSort($data);
$filtered = cleanArray($data, $searchValue);
print_r([
    'src' => $data,
    'cleanValue' => $searchValue,
    'dst' => $filtered
]);
function cleanArray(array $array, int $value): array
{
    while (($index = Searcher::linearSearch($array, $value)) !== null) {
        unset($array[$index]);
        $array = array_values($array);
    }
    return $array;
}
