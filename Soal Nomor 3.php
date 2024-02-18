<?php
$lights = ['merah', 'kuning', 'hijau'];
$light = '';
$step = 0;

while (true) {
    $input = readline('Press Enter : ');
    if ($step == 3) {
        $step = 0;
    }
    echo $lights[$step], PHP_EOL;
    $step++;
}