<?php
function cekKarakter($string)
{
    $karakter_count = [];
    $panjang_string = strlen($string);

    for ($i = 0; $i < $panjang_string; $i++) {
        $karakter = $string[$i];
        if (!isset($karakter_count[$karakter])) {
            $karakter_count[$karakter] = 1;
        } else {
            $karakter_count[$karakter]++;
        }
    }

    $karakter_terbanyak = '';
    $jumlah_terbanyak = 0;

    foreach ($karakter_count as $karakter => $jumlah) {
        if ($jumlah > $jumlah_terbanyak) {
            $karakter_terbanyak = $karakter;
            $jumlah_terbanyak = $jumlah;
        }
    }

    echo "$karakter_terbanyak $jumlah_terbanyak" . "x";
}

while (true) {
    $input = readline('Masukkan kata : ');
    echo cekKarakter($input), PHP_EOL;
}