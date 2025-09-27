<?php
// Mendefinisikan fungsi untuk menampilkan judul
function judul() {
    echo "<h2>Nama-Nama Hari:</h2>";
}

// Memanggil fungsi judul
judul();

// Membuat array yang berisi nama-nama hari
$hari[0] = "Senin";
$hari[1] = "Selasa";
$hari[2] = "Rabu";
$hari[3] = "Kamis";
$hari[4] = "Jumat";
$hari[5] = "Sabtu";
$hari[6] = "Minggu";

// Menampilkan isi array
echo "Daftar nama-nama hari: <br>";
echo $hari[0] . "<br>";
echo $hari[1] . "<br>";
echo $hari[2] . "<br>";
echo $hari[3] . "<br>";
echo $hari[4] . "<br>";
echo $hari[5] . "<br>";
echo $hari[6] . "<br>";
?>
