<?php
$i = 1;
while ($i <= 100) {

    $nprimo = 1;

    for ($n = 2; $n < $i; $n++) {

        if ($i % $n == 0) {

            $nprimo = 0;

            break;

        }

    }
    if ($nprimo == 1)
        echo "$i ";
    $i++;
}