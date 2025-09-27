<?php
// Fungsi untuk menghitung luas
function hitungLuasPersegiPanjang($panjang, $lebar) {
    $luas = $panjang * $lebar;
    return $luas;
}

$panjang = 10;
$lebar = 5;
// Memanggil fungsi dan menyimpan hasilnya
$luas = hitungLuasPersegiPanjang($panjang, $lebar);
echo "Luas persegi panjang: " . $luas; // Output: Luas persegi panjang: 50
?>