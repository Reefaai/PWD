<?php
// Fungsi untuk mengecek apakah bilangan adalah prima
function isPrima($bilangan) {
    if ($bilangan <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($bilangan); $i++) {
        if ($bilangan % $i == 0) {
            return false;
        }
    }
    return true;
}

$angka = 7;
if (isPrima($angka)) {
    echo "$angka adalah bilangan prima.";
} else {
    echo "$angka bukan bilangan prima.";
}
// Output: 7 adalah bilangan prima.
?>