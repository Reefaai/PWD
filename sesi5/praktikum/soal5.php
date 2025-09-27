<?php

// Contoh array yang disediakan
$bilangan = array(10, 20, 30, 40, 50);
$kata = array("Merah", "Kuning", "Hijau", "Biru", "Ungu");
$data = array(1, "Belajar", 3.14, true, false);

echo "<h2>Menampilkan Elemen Array Menggunakan Foreach</h2>";

// Menampilkan array \$bilangan
echo "<h3>Isi Array \$bilangan:</h3>";
echo "<ul>";
foreach ($bilangan as $b) {
    echo "<li>" . $b . "</li>";
}
echo "</ul><hr>";

// Menampilkan array \$kata
echo "<h3>Isi Array \$kata:</h3>";
echo "<ul>";
foreach ($kata as $k) {
    echo "<li>" . $k . "</li>";
}
echo "</ul><hr>";

// Menampilkan array \$data
echo "<h3>Isi Array \$data:</h3>";
echo "<ul>";
foreach ($data as $d) {
    // var_export digunakan untuk menampilkan nilai boolean (true/false) dengan benar
    echo "<li>" . var_export($d, true) . "</li>";
}
echo "</ul>";

?>