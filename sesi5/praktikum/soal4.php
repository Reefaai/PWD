<?php

$string_awal = "selamat datang di praktikum pemrograman web dasar";
$string_kapital = "";
$i = 0;
$panjang_string = strlen($string_awal);

echo "<h2>Mengubah Huruf Menjadi Kapital</h2>";
echo "String Awal: " . $string_awal . "<br>";

// Menggunakan while untuk iterasi sepanjang string
while ($i < $panjang_string) {
    // Mengambil satu karakter dan mengubahnya menjadi kapital
    $karakter_kapital = strtoupper($string_awal[$i]);
    // Menambahkan karakter yang sudah diubah ke string hasil
    $string_kapital .= $karakter_kapital;
    $i++;
}

echo "String Hasil (Kapital): " . $string_kapital . "<br>";

?>