<?php
function cetakBilangan($n)
{
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024\n";
        } elseif ($i % 5 == 0) {
            echo "2024\n";
        } elseif ($i % 4 == 0) {
            echo "Pemrograman\n";
        } elseif ($i % 6 == 0) {
            echo "Website\n";
        } else {
            echo $i . "\n";
        }
    }
}

while (true) {
    $input = readline("Masukkan bilangan positif (atau tekan Enter untuk berhenti): ");

    if (trim($input) === "") {
        echo "Program dihentikan.\n";
        break;
    }

    if (is_numeric($input) && $input > 0 && intval($input) == $input) {
        cetakBilangan(intval($input));
    } else {
        echo "Masukkan bilangan bulat positif yang valid.\n";
    }
}
