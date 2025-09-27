<?php
$hari = 7;

switch ($hari) {
    case 1:
        echo "Senin: Semangat awal pekan!";
        break;
    case 2:
        echo "Selasa: Tetap produktif!";
        break;
    case 3:
        echo "Rabu: Jaga konsistensi!";
        break;
    case 4:
        echo "Kamis: Evaluasi progres!";
        break;
    case 5:
        echo "Jumat: Tuntaskan target!";
        break;
    case 6:
    case 7:
        echo "Akhir pekan: Istirahat & refleksi.";
        break;
    default:
        echo "Input hari tidak valid.";
}
?>