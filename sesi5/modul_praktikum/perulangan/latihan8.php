<?php
$angkaDicari = 42;
$data = [5, 12, 42, 7, 9, 42, 10];
$ditemukan = false;

foreach ($data as $v) {
    if ($v == $angkaDicari) {
        $ditemukan = true;
        echo "Ketemu $angkaDicari!";
        break;
    }
}

if (!$ditemukan) {
    echo "Tidak ditemukan.";
}
?>