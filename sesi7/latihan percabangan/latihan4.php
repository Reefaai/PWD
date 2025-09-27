<?php
function urutkanArray($arr, $urut) {
    if ($urut === 'asc') {
        sort($arr);
    } elseif ($urut === 'desc') {
        rsort($arr);
    } else {
        echo "Pilihan urutan tidak valid";
        return;
    }
    print_r($arr);
}

$angka = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3];
echo "Urutan descending: ";
urutkanArray($angka, 'desc');
// Output: Array ( [0] => 9 [1] => 6 [2] => 5 [3] => 5 [4] => 4 [5] => 3 [6] => 3 [7] => 2 [8] => 1 [9] => 1 )
?>