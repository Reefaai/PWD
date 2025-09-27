<?php
$beratKg = 1.8;
$zona = "JAWA";
$tarifPerKg = 0;

switch ($zona) {
    case "JAWA":
        $tarifPerKg = 10000;
        break;
    case "LUAR_JAWA":
        $tarifPerKg = 15000;
        break;
    default:
        $tarifPerKg = 20000;
}

$kgDikenakan = (int) ceil($beratKg);

$diskon = 0;
if ($kgDikenakan >= 5) {
    $diskon = 0.1;
}

$subtotal = $kgDikenakan * $tarifPerKg;
$total = $subtotal - ($subtotal * $diskon);

echo "Zona: $zona<br>Berat: $beratKg kg (dibulatkan $kgDikenakan kg)<br>";
echo "Tarif/kg: Rp$tarifPerKg<br>Subtotal: Rp$subtotal<br>";
echo $diskon > 0 ? "Diskon 10% berlaku<br>" : "Tanpa diskon<br>";
echo "Total bayar: Rp$total";
?>