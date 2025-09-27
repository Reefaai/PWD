<?php
// Fungsi ini melengkapi contoh yang ada di PDF
function nilaiHuruf($nilai) {
    if ($nilai >= 90) return "A";
    elseif ($nilai >= 80) return "B";
    elseif ($nilai >= 70) return "C";
    elseif ($nilai >= 60) return "D";
    else return "E";
}

$nilaiAngka = 85;
echo "Nilai $nilaiAngka setara dengan nilai huruf: " . nilaiHuruf($nilaiAngka);
// Output: Nilai 85 setara dengan nilai huruf: B
?>