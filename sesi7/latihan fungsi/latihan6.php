<?php
// Fungsi rekursif untuk menghitung faktorial
function faktorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }
}

$angka = 5;
echo "Faktorial dari $angka adalah: " . faktorial($angka); // Output: Faktorial dari 5 adalah: 120
?>