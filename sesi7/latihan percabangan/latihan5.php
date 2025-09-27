<?php
function kalender($bulan, $tahun) {
    $hari = array("Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min");
    $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
    // Mengubah indeks hari agar Senin = 0, Minggu = 6
    $hariPertama = date('N', strtotime("$tahun-$bulan-01")) - 1;

    echo "<h3>Kalender " . date("F Y", mktime(0, 0, 0, $bulan, 1, $tahun)) . "</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    foreach ($hari as $h) {
        echo "<th>$h</th>";
    }
    echo "</tr>";

    $hariIni = 1;
    echo "<tr>";

    // Sel kosong sebelum hari pertama
    for ($j = 0; $j < $hariPertama; $j++) {
        echo "<td></td>";
    }

    $kolom = $hariPertama;
    while ($hariIni <= $jumlahHari) {
        if ($kolom == 7) {
            $kolom = 0;
            echo "</tr><tr>";
        }
        echo "<td>$hariIni</td>";
        $hariIni++;
        $kolom++;
    }

    // Sel kosong setelah hari terakhir
    while ($kolom < 7) {
        echo "<td></td>";
        $kolom++;
    }

    echo "</tr>";
    echo "</table>";
}

kalender(9, 2025); // Menampilkan kalender September 2025
?>