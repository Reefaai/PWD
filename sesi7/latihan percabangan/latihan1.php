<?php
function isKabisat($tahun) {
    if (($tahun % 4 == 0 && $tahun % 100 != 0) || $tahun % 400 == 0) {
        return true;
    } else {
        return false;
    }
}

$tahun = 2024;
if (isKabisat($tahun)) {
    echo "$tahun adalah tahun kabisat.";
} else {
    echo "$tahun bukan tahun kabisat.";
}
// Output: 2024 adalah tahun kabisat.
?>