<?php
function judul() {
    echo "<h2>Latihan 2: Mata Kuliah dan Dosen</h2>";
}

judul();

// Indexed array untuk nama mata kuliah
$mataKuliah = array(
    "Pemrograman Web", 
    "Desain Analis Algoritma", 
    "Analisis Perancangan Sistem", 
    "Rekayasa Perangkat Lunak", 
    "Jaringan Komputer"
);

echo "<b>Nama Mata Kuliah Teknik Informatika:</b><br>";
for ($i = 0; $i < count($mataKuliah); $i++) {
    echo ($i + 1) . ". " . $mataKuliah[$i] . "<br>";
}

echo "<hr>";

// Associative array untuk pasangan mata kuliah dan dosen
$dosen = array(
    "Pemrograman Web" => "Abdi Pandu Kusuma",
    "Desain Analis Algoritma" => "Sri Lestanti",
    "Analisis Perancangan Sistem" => "Kurnia Kartika",
    "Rekayasa Perangkat Lunak" => "Indyah Hartami Santi",
    "Jaringan Komputer" => "Chulkamdi"
);

echo "<b>Daftar Dosen TI Unisba Blitar:</b><br>";
foreach ($dosen as $matkul => $nama) {
    echo "<b>$matkul:</b> " . $nama . "<br>";
}
?>