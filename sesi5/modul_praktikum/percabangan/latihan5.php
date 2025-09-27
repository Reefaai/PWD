<?php
$nama = "Rudi";
$umur = 19;

if ($nama == "") {
    echo "Nama wajib diisi.";
    return;
}

if ($umur < 18) {
    echo "Umur minimal 18 tahun.";
    return;
}

echo "Form valid. Nama: $nama, Umur: $umur";
?>