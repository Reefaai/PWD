<?php
// SOAL ESSAY 1 - KASUS RENTAL MOBIL
// Program PHP untuk menampilkan daftar harga rental mobil

// Inisialisasi data mobil dengan harga per hari
$daftar_mobil = array(
    1 => array("nama" => "Toyota Avanza", "harga_per_hari" => 300000),
    2 => array("nama" => "Honda Jazz", "harga_per_hari" => 350000),
    3 => array("nama" => "Toyota Innova", "harga_per_hari" => 450000),
    4 => array("nama" => "Honda CR-V", "harga_per_hari" => 550000),
    5 => array("nama" => "Toyota Fortuner", "harga_per_hari" => 650000)
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rental Mobil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-group { margin: 10px 0; }
        input[type="number"] { padding: 8px; width: 200px; }
        button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .result { margin-top: 20px; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Rental Mobil</h1>
        
        <!-- Form Input untuk Jumlah Mobil dan Hari Sewa -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="jumlah_mobil">Jumlah Mobil:</label><br>
                <input type="number" id="jumlah_mobil" name="jumlah_mobil" min="1" max="5" required 
                       value="<?php echo isset($_POST['jumlah_mobil']) ? $_POST['jumlah_mobil'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="jumlah_hari">Jumlah Hari Sewa:</label><br>
                <input type="number" id="jumlah_hari" name="jumlah_hari" min="1" required
                       value="<?php echo isset($_POST['jumlah_hari']) ? $_POST['jumlah_hari'] : ''; ?>">
            </div>
            
            <button type="submit" name="submit">Hitung Harga Rental</button>
        </form>

        <?php
        // Proses form setelah tombol submit ditekan
        if (isset($_POST['submit'])) {
            $jumlah_mobil = (int)$_POST['jumlah_mobil'];
            $jumlah_hari = (int)$_POST['jumlah_hari'];
            
            // Validasi input
            if ($jumlah_mobil > 0 && $jumlah_hari > 0 && $jumlah_mobil <= 5) {
                echo '<div class="result">';
                echo '<h2>Daftar Harga Rental Mobil</h2>';
                echo '<p><strong>Jumlah Mobil:</strong> ' . $jumlah_mobil . ' unit</p>';
                echo '<p><strong>Jumlah Hari:</strong> ' . $jumlah_hari . ' hari</p>';
                
                // Tabel untuk menampilkan daftar mobil dan harga
                echo '<table>';
                echo '<tr>';
                echo '<th>No. Mobil</th>';
                echo '<th>Nama Mobil</th>';
                echo '<th>Harga/Hari</th>';
                echo '<th>Total Hari</th>';
                echo '<th>Total Harga</th>';
                echo '</tr>';
                
                $total_keseluruhan = 0;
                
                // Loop for untuk menampilkan data mobil sesuai jumlah yang diminta
                for ($i = 1; $i <= $jumlah_mobil; $i++) {
                    // Hitung total harga per mobil menggunakan perulangan for
                    $harga_per_hari = $daftar_mobil[$i]['harga_per_hari'];
                    $total_harga_mobil = 0;
                    
                    // Perulangan for untuk menghitung total harga (Harga/Hari × Jumlah Hari)
                    for ($j = 1; $j <= $jumlah_hari; $j++) {
                        $total_harga_mobil += $harga_per_hari;
                    }
                    
                    // Tampilkan baris tabel untuk setiap mobil
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . $daftar_mobil[$i]['nama'] . '</td>';
                    echo '<td>Rp ' . number_format($harga_per_hari, 0, ',', '.') . '</td>';
                    echo '<td>' . $jumlah_hari . ' hari</td>';
                    echo '<td>Rp ' . number_format($total_harga_mobil, 0, ',', '.') . '</td>';
                    echo '</tr>';
                    
                    // Tambahkan ke total keseluruhan
                    $total_keseluruhan += $total_harga_mobil;
                }
                
                // Tampilkan total keseluruhan
                echo '<tr style="font-weight: bold; background-color: #e8f5e8;">';
                echo '<td colspan="4">TOTAL KESELURUHAN</td>';
                echo '<td>Rp ' . number_format($total_keseluruhan, 0, ',', '.') . '</td>';
                echo '</tr>';
                
                echo '</table>';
                echo '</div>';
            } else {
                // Tampilkan pesan error jika input tidak valid
                echo '<div class="result" style="background-color: #ffe6e6; border-color: #ff9999;">';
                echo '<p style="color: red;"><strong>Error:</strong> Masukkan jumlah mobil (1-5) dan jumlah hari yang valid!</p>';
                echo '</div>';
            }
        }
        ?>
        
        <!-- Komentar untuk menjelaskan fungsi setiap blok kode -->
        <div style="margin-top: 30px; padding: 15px; background-color: #f0f8ff; border: 1px solid #b6d7ff;">
            <h3>Penjelasan Kode:</h3>
            <ul>
                <li><strong>Inisialisasi Data:</strong> Array $daftar_mobil berisi data mobil dan harga per hari</li>
                <li><strong>Form Input:</strong> Form HTML untuk memasukkan jumlah mobil dan jumlah hari</li>
                <li><strong>Validasi Input:</strong> Memastikan input berupa angka positif dan jumlah mobil maksimal 5</li>
                <li><strong>Loop For Utama:</strong> Menampilkan setiap mobil sesuai jumlah yang diminta</li>
                <li><strong>Loop For Perhitungan:</strong> Menghitung total harga dengan mengalikan harga per hari × jumlah hari</li>
                <li><strong>Tabel HTML:</strong> Menampilkan hasil dalam format tabel yang rapi</li>
                <li><strong>Format Mata Uang:</strong> Menggunakan number_format() untuk format Rupiah</li>
            </ul>
        </div>
    </div>
</body>
</html>