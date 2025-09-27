<?php
// Menggunakan kembali fungsi isPrima dari latihan sebelumnya
function isPrima($bilangan) {
    if ($bilangan <= 1) return false;
    for ($i = 2; $i <= sqrt($bilangan); $i++) {
        if ($bilangan % $i == 0) return false;
    }
    return true;
}

function tampilkanBilanganPrima() {
    echo "Bilangan prima antara 1-100: <br>";
    for ($i = 2; $i < 100; $i++) {
        if (isPrima($i)) {
            echo $i . " ";
        }
    }
}

tampilkanBilanganPrima();
?>