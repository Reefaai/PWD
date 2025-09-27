<?php

echo "<h2>Bilangan Ganjil dari 1-100 (Menggunakan For Loop)</h2>";
for ($i = 1; $i <= 100; $i++) {
    // Mengecek apakah angka saat ini adalah ganjil
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<hr>";

echo "<h2>Bilangan Genap dari 1-100 (Menggunakan While Loop)</h2>";
$j = 1;
while ($j <= 100) {
    // Mengecek apakah angka saat ini adalah genap
    if ($j % 2 == 0) {
        echo $j . " ";
    }
    $j++;
}

?>