<?php
$bulan = 5;

if (PHP_VERSION_ID >= 80000) {
    $kuartal = match (true) {
        $bulan >= 1 && $bulan <= 3 => "Q1",
        $bulan >= 4 && $bulan <= 6 => "Q2",
        $bulan >= 7 && $bulan <= 9 => "Q3",
        $bulan >= 10 && $bulan <= 12 => "Q4",
        default => "Bulan tidak valid",
    };
    echo "Bulan $bulan adalah $kuartal";
} else {
    if ($bulan >= 1 && $bulan <= 3) $kuartal = "Q1";
    elseif ($bulan <= 6) $kuartal = "Q2";
    elseif ($bulan <= 9) $kuartal = "Q3";
    elseif ($bulan <= 12) $kuartal = "Q4";
    else $kuartal = "Bulan tidak valid";
    
    echo "Bulan $bulan adalah $kuartal (via if-elseif)";
}
?>