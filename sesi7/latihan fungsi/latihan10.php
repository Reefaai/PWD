<?php
// Prosedur untuk menampilkan tabel perkalian
function tabelPerkalian($n) {
    echo "<pre>"; // Menggunakan tag <pre> agar format rapi
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            echo ($i * $j) . "\t";
        }
        echo "\n";
    }
    echo "</pre>";
}

tabelPerkalian(5);
?>