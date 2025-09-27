<?php
// Prosedur untuk menampilkan bilangan ganjil 1-10
function tampilkanBilanganGanjil() {
    echo "Bilangan ganjil 1-10: ";
    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 != 0) {
            echo $i . " ";
        }
    }
}

tampilkanBilanganGanjil(); // Output: Bilangan ganjil 1-10: 1 3 5 7 9
?>