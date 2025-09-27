<?php
function judul() {
    echo "<h2>Latihan 3: Mengurutkan Array</h2>";
}

judul();

$matkul = array(
    "Pemrograman Web", 
    "Desain Analis Algoritma", 
    "Analisis Perancangan Sistem", 
    "Rekayasa Perangkat Lunak", 
    "Jaringan Komputer"
);

echo "<b>Nama Mata Kuliah (sebelum diurutkan):</b> <br>";
foreach ($matkul as $key => $value) {
    echo ($key + 1) . ": " . $value . "<br>";
}

echo "<hr>";

// Mengurutkan array
sort($matkul);

echo "<b>Nama Mata Kuliah (setelah diurutkan):</b> <br>";
foreach ($matkul as $key => $value) {
    echo ($key + 1) . ": " . $value . "<br>";
}
?>