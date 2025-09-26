<?php
// SOAL ESSAY 2 - KASUS RESERVASI HOTEL
// Program PHP Native untuk menampilkan perhitungan harga kamar dan simulasi pemesanan

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi Hotel</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input[type="number"] { width: 200px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin: 5px; }
        button:hover { background-color: #0056b3; }
        .btn-reserve { background-color: #28a745; }
        .btn-reserve:hover { background-color: #218838; }
        .result { background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-top: 20px; }
        .discount { color: #dc3545; font-weight: bold; }
        .room-list { margin-top: 15px; }
        .room-list ul { list-style-type: none; padding: 0; }
        .room-list li { background-color: #e9ecef; padding: 8px; margin: 5px 0; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Reservasi Hotel</h1>
        
        <!-- Form untuk memilih jenis kamar dan jumlah malam -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="jenis_kamar">Pilih Jenis Kamar:</label>
                <select id="jenis_kamar" name="jenis_kamar" required>
                    <option value="">-- Pilih Jenis Kamar --</option>
                    <option value="Standard" <?php echo (isset($_POST['jenis_kamar']) && $_POST['jenis_kamar'] == 'Standard') ? 'selected' : ''; ?>>Standard</option>
                    <option value="Deluxe" <?php echo (isset($_POST['jenis_kamar']) && $_POST['jenis_kamar'] == 'Deluxe') ? 'selected' : ''; ?>>Deluxe</option>
                    <option value="Suite" <?php echo (isset($_POST['jenis_kamar']) && $_POST['jenis_kamar'] == 'Suite') ? 'selected' : ''; ?>>Suite</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="jumlah_malam">Jumlah Malam:</label>
                <input type="number" id="jumlah_malam" name="jumlah_malam" min="1" value="<?php echo isset($_POST['jumlah_malam']) ? $_POST['jumlah_malam'] : ''; ?>" required>
            </div>
            
            <button type="submit" name="submit">Hitung Harga</button>
        </form>

        <?php
        // Cek apakah form telah disubmit
        if (isset($_POST['submit'])) {
            // Ambil data dari form
            $jenis_kamar = $_POST['jenis_kamar'];
            $jumlah_malam = $_POST['jumlah_malam'];
            
            // Tentukan harga per malam menggunakan if-else
            $harga_per_malam = 0;
            if ($jenis_kamar == "Standard") {
                $harga_per_malam = 500000;
            } elseif ($jenis_kamar == "Deluxe") {
                $harga_per_malam = 800000;
            } elseif ($jenis_kamar == "Suite") {
                $harga_per_malam = 1500000;
            }
            
            // Hitung Total Biaya = Harga per Malam × Jumlah Malam
            $total_biaya = $harga_per_malam * $jumlah_malam;
            $total_akhir = $total_biaya;
            $diskon = 0;
            
            echo "<div class='result'>";
            echo "<h2>Detail Reservasi</h2>";
            echo "<p><strong>Jenis Kamar:</strong> " . $jenis_kamar . "</p>";
            echo "<p><strong>Harga per Malam:</strong> Rp " . number_format($harga_per_malam, 0, ',', '.') . "</p>";
            echo "<p><strong>Jumlah Malam:</strong> " . $jumlah_malam . " malam</p>";
            echo "<p><strong>Total Biaya:</strong> Rp " . number_format($total_biaya, 0, ',', '.') . "</p>";
            
            // Cek jika total biaya > Rp 2.000.000, tampilkan pesan "Anda mendapat diskon 10%"
            if ($total_biaya > 2000000) {
                $diskon = $total_biaya * 0.10; // 10% diskon
                $total_akhir = $total_biaya - $diskon;
                echo "<p class='discount'>🎉 Anda mendapat diskon 10%!</p>";
                echo "<p><strong>Diskon:</strong> Rp " . number_format($diskon, 0, ',', '.') . "</p>";
                echo "<p><strong>Total Setelah Diskon:</strong> Rp " . number_format($total_akhir, 0, ',', '.') . "</p>";
            }
            
            // Tampilkan daftar malam per hari (1 s/d jumlah malam) menggunakan while loop
            echo "<div class='room-list'>";
            echo "<h3>Daftar Malam Menginap:</h3>";
            echo "<ul>";
            
            $malam_ke = 1;
            while ($malam_ke <= $jumlah_malam) {
                echo "<li>Malam ke-" . $malam_ke . " = 1 kamar malam (Rp " . number_format($harga_per_malam, 0, ',', '.') . ")</li>";
                $malam_ke++;
            }
            
            echo "</ul>";
            echo "</div>";
            
            echo "</div>";
            
            // Tampilkan tombol konfirmasi "Reservasi Lagi" untuk mengarahkan ke proses booking
            echo "<form method='POST' action='' style='margin-top: 20px;'>";
            echo "<input type='hidden' name='jenis_kamar_booking' value='" . $jenis_kamar . "'>";
            echo "<input type='hidden' name='jumlah_malam_booking' value='" . $jumlah_malam . "'>";
            echo "<input type='hidden' name='total_akhir_booking' value='" . $total_akhir . "'>";
            echo "<button type='submit' name='reservasi_lagi' class='btn-reserve'>Reservasi Lagi (VTT)</button>";
            echo "</form>";
        }
        
        // Proses booking jika tombol "Reservasi Lagi" diklik
        if (isset($_POST['reservasi_lagi'])) {
            $jenis_kamar_booking = $_POST['jenis_kamar_booking'];
            $jumlah_malam_booking = $_POST['jumlah_malam_booking'];
            $total_akhir_booking = $_POST['total_akhir_booking'];
            
            echo "<div class='result'>";
            echo "<h2>🎊 Proses Booking Berhasil!</h2>";
            echo "<p>Terima kasih telah melakukan reservasi!</p>";
            echo "<p><strong>Detail Pemesanan:</strong></p>";
            echo "<ul>";
            echo "<li>Jenis Kamar: " . $jenis_kamar_booking . "</li>";
            echo "<li>Jumlah Malam: " . $jumlah_malam_booking . " malam</li>";
            echo "<li>Total Pembayaran: Rp " . number_format($total_akhir_booking, 0, ',', '.') . "</li>";
            echo "</ul>";
            echo "<p><em>Reservasi Anda sedang diproses. Tim kami akan menghubungi Anda segera.</em></p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>