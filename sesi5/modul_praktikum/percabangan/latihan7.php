<?php
$harga = 100000;
$isMember = true;

$diskon = $isMember ? 0.10 : 0.0;
$total = $harga - ($harga * $diskon);

echo "Harga awal: Rp$harga<br>";
echo $isMember ? "Anda member, diskon 10%<br>" : "Bukan member<br>";
echo "Total bayar: Rp$total";
?>