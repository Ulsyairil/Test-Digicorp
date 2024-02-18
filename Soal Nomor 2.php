<?php

class Siswa
{
    public $nrp;
    public $nama;
    public $daftar_nilai;

    function __construct($nrp, $nama, $daftar_nilai)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftar_nilai = $daftar_nilai;
    }
}

class Nilai
{
    public $mapel;
    public $nilai;

    function __construct($mapel, $nilai)
    {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

while (true) {
    $input = readline('Choose answer a, b, or c : ');

    if ($input == 'a') {
        $daftarNilai = array(new Nilai('indonesia', 80), new Nilai('inggris', 70), new Nilai('ipa', 75));
        print_r($daftarNilai);
    }

    if ($input == 'b') {
        $daftarNilai[1]->nilai = 100;
        $siswa = array(
            new Siswa('32131221', 'John Smith', $daftarNilai[1])
        );
        print_r($siswa);
    }

    if ($input == 'c') {
        $siswa = [];
        for ($i = 0; $i < 10; $i++) {
            $random_nrp = rand(100000, 1000000);
            $random_mapel = rand(0, 2);
            $random_nilai = rand(0, 100);

            $mapel = $daftarNilai[$random_mapel];
            $mapel->nilai = $random_nilai;
            array_push($siswa, new Siswa($random_nrp, generateRandomString(20), $mapel));
        }
        print_r($siswa);
    }
}