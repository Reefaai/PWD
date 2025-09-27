<?php
$skor = 83;

if ($skor >= 85) {
    $huruf = "A";
} elseif ($skor >= 75) {
    $huruf = "B";
} elseif ($skor >= 65) {
    $huruf = "C";
} elseif ($skor >= 55) {
    $huruf = "D";
} else {
    $huruf = "E";
}

echo "Skor: $skor Nilai: $huruf";
?>