<?php
// praktikum2_nama_hari.php
// Soal Praktikum Switch 2 - Penentuan Hari dalam Seminggu

if (isset($_POST['cek_hari'])) {
    $nomorHari = (int)$_POST['nomor_hari'];
    
    switch ($nomorHari) {
        case 1:
            $namaHari = "Senin";
            $jenisHari = "Hari Kerja";
            $warna = "#3498db";
            break;
        case 2:
            $namaHari = "Selasa";
            $jenisHari = "Hari Kerja";
            $warna = "#3498db";
            break;
        case 3:
            $namaHari = "Rabu";
            $jenisHari = "Hari Kerja";
            $warna = "#3498db";
            break;
        case 4:
            $namaHari = "Kamis";
            $jenisHari = "Hari Kerja";
            $warna = "#3498db";
            break;
        case 5:
            $namaHari = "Jumat";
            $jenisHari = "Hari Kerja";
            $warna = "#3498db";
            break;
        case 6:
            $namaHari = "Sabtu";
            $jenisHari = "Akhir Pekan";
            $warna = "#e74c3c";
            break;
        case 7:
            $namaHari = "Minggu";
            $jenisHari = "Akhir Pekan";
            $warna = "#e74c3c";
            break;
        default:
            $namaHari = null;
            $jenisHari = null;
            $warna = null;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Switch 2 - Nama Hari</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%); min-height: 100vh; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
        .info { background: #e3f2fd; border-left: 4px solid #2196f3; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .day-reference { background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .day-item { display: flex; justify-content: space-between; padding: 5px 0; }
        form { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .form-group { margin: 15px 0; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #2c3e50; }
        input { width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 16px; }
        button { background: linear-gradient(45deg, #74b9ff, #0984e3); color: white; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; width: 100%; }
        button:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(116, 185, 255, 0.4); }
        .result { background: #e8f5e8; border: 2px solid #4caf50; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center; }
        .error { background: #ffebee; border: 2px solid #f44336; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center; color: #c62828; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Penentuan Nama Hari</h1>
        
        <div class="info">
            <strong>Kode Hari:</strong> Masukkan angka 1-7 untuk mendapatkan nama hari
        </div>

        <div class="day-reference">
            <h3 style="margin-top: 0; color: #2c3e50;">Referensi Hari:</h3>
            <div class="day-item"><span>1</span><span>Senin</span></div>
            <div class="day-item"><span>2</span><span>Selasa</span></div>
            <div class="day-item"><span>3</span><span>Rabu</span></div>
            <div class="day-item"><span>4</span><span>Kamis</span></div>
            <div class="day-item"><span>5</span><span>Jumat</span></div>
            <div class="day-item"><span>6</span><span>Sabtu</span></div>
            <div class="day-item"><span>7</span><span>Minggu</span></div>
        </div>

        <?php if (isset($namaHari)): ?>
            <div class="result">
                <h3>Hasil Pencarian Hari:</h3>
                <p><strong>Nomor Hari:</strong> <?= $nomorHari ?></p>
                <p><strong>Nama Hari:</strong> <span style="color: <?= $warna ?>; font-size: 24px; font-weight: bold;"><?= $namaHari ?></span></p>
                <p><strong>Jenis:</strong> <span style="color: <?= $warna ?>;"><?= $jenisHari ?></span></p>
            </div>
        <?php elseif (isset($_POST['cek_hari'])): ?>
            <div class="error">
                <h3>Error: Nomor hari tidak valid!</h3>
                <p>Masukkan angka 1-7 sesuai dengan kode hari yang tersedia.</p>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Nomor Hari (1-7):</label>
                <input type="number" name="nomor_hari" min="1" max="7" required value="<?= $_POST['nomor_hari'] ?? '' ?>" placeholder="Masukkan angka 1 sampai 7">
            </div>
            <button type="submit" name="cek_hari">Cek Nama Hari</button>
        </form>
    </div>
</body>
</html>