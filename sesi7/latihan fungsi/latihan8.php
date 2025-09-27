<?php
// Fungsi untuk mencari nilai maksimum dalam array
function nilaiMaksimum($arr) {
    return max($arr);
}

$angka = [10, 5, 25, 18, 30];
echo "Nilai maksimum dalam array adalah: " . nilaiMaksimum($angka); // Output: 30
?>