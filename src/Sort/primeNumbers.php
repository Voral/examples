<?php

echo getPrimeByPosition(10001);

function getPrimeByPosition(int $position): int
{
    --$position;
    $prime = 2;
    for ($i = 1; $i <= $position; ++$i) {
        $prime = nextPrime($prime);
    }
    return $prime;
}


function nextPrime(int $num): int
{
    do {
        $num++;
        $prime = true;
        for ($i = 2; $i <= sqrt($num); ++$i) {
            if ($num % $i === 0) {
                $prime = false;
                break;
            }
        }
    } while (!$prime);
    return $num;
}