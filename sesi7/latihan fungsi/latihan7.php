<?php
// Prosedur untuk mengurutkan dan menampilkan array
function urutkanAscending($arr) {
    sort($arr);
    echo "Array setelah diurutkan: ";
    print_r($arr);
}

$angka = [4, 2, 8, 6, 1];
urutkanAscending($angka); // Output: Array setelah diurutkan: Array ( [0] => 1 [1] => 2 [2] => 4 [3] => 6 [4] => 8 )
?>