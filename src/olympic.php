<?php
function largest(int $number): int
{
    $i = 2;
    while ($i <= $number) {
        if (0 === $number % $i) {
            $number /= $i;
        } else {
            $i++;
        }
    }
    return $i;
}

$number = 600851475143;
echo "Самый большой простой делитель ", largest(600851475143), PHP_EOL;


