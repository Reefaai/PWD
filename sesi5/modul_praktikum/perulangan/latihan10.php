<?php
$tinggi = 5;

for ($baris = 1; $baris <= $tinggi; $baris++) {
    // cetak spasi
    for ($s = 1; $s <= $tinggi - $baris; $s++) {
        echo "&nbsp;&nbsp;";
    }
    
    // cetak bintang
    for ($b = 1; $b <= (2 * $baris - 1); $b++) {
        echo "*";
    }
    
    echo "<br>";
}
?>