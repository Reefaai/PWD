<?php

echo "<h2>Mencari Bilangan Prima antara 1 - 100</h2>";

// Looping untuk iterasi setiap angka dari 1 sampai 100
for ($angka = 1; $angka <= 100; $angka++) {
    // Bilangan prima harus lebih besar dari 1
    if ($angka > 1) {
        $is_prima = true; // Asumsikan angka adalah prima
        
        // Pengecekan pembagi dari 2 sampai akar kuadrat dari angka
        for ($pembagi = 2; $pembagi <= sqrt($angka); $pembagi++) {
            if ($angka % $pembagi == 0) {
                $is_prima = false; // Jika ada pembagi lain, bukan prima
                break; // Keluar dari loop pengecekan
            }
        }

        if ($is_prima) {
            echo $angka . " ";
        }
    }
}

?>