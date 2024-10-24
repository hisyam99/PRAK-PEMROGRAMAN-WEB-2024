<?php
$n = 5;

for ($i = $n; $i >= 1; $i--) {
    for ($j = $n; $j > $i; $j--) {
        echo " ";
    }

    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

    echo "\n";
}
