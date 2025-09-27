<?php
$produk = [
    ["nama" => "Pulpen", "harga" => 3000],
    ["nama" => "Buku", "harga" => 12000],
    ["nama" => "Penggaris", "harga" => 5000]
];

echo "<table border='1' cellpadding='6'><tr><th>Nama</th><th>Harga</th></tr>";
foreach ($produk as $p) {
    echo "<tr><td>{$p['nama']}</td><td>Rp{$p['harga']}</td></tr>";
}
echo "</table>";
?>