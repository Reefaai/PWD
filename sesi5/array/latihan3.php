<?php
// latihan3_tarif_taksi.php
// Latihan 3 - Perhitungan Tarif Taksi

if (isset($_POST['hitung_tarif'])) {
    $jarak = (float)$_POST['jarak_tempuh'];
    
    if ($jarak > 0) {
        $tarifAwal = 5000;
        
        if ($jarak <= 1) {
            $tarifTotal = $tarifAwal + (($jarak - 1) * 3000);
            if ($tarifTotal < $tarifAwal) $tarifTotal = $tarifAwal; // minimal tarif awal
            $keterangan = "Jarak ≤ 1 km: Tarif awal Rp 5.000 + Rp 3.000/km";
            $perhitungan = "Rp 5.000 + (($jarak - 1) x Rp 3.000) = Rp " . number_format($tarifTotal, 0, ',', '.');
        } else {
            $tarifTotal = $tarifAwal + (($jarak - 1) * 2000);
            $keterangan = "Jarak > 1 km: Tarif awal Rp 5.000 + Rp 2.000/km";
            $perhitungan = "Rp 5.000 + (($jarak - 1) x Rp 2.000) = Rp " . number_format($tarifTotal, 0, ',', '.');
        }
    } else {
        $error = "Jarak harus lebih dari 0!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 - Perhitungan Tarif Taksi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        .info { background: #e3f2fd; border-left: 4px solid #2196f3; padding: 15px; margin: 15px 0; }
        form { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .form-group { margin: 10px 0; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input { width: 200px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #3498db; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #2980b9; }
        .result { background: #e8f5e8; border: 1px solid #4caf50; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .error { background: #ffebee; border: 1px solid #f44336; padding: 15px; border-radius: 5px; margin: 15px 0; color: #c62828; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Latihan 3 - Perhitungan Tarif Taksi</h1>
        
        <div class="info">
            <strong>Ketentuan Tarif:</strong><br>
            • Jarak ≤ 1 km → Tarif awal Rp 5.000 + Rp 3.000/km selanjutnya<br>
            • Jarak > 1 km → Tarif awal Rp 5.000 + Rp 2.000/km selanjutnya
        </div>

        <?php if (isset($tarifTotal)): ?>
            <div class="result">
                <h3>Hasil Perhitungan Tarif:</h3>
                <p><strong>Jarak Tempuh:</strong> <?= $jarak ?> km</p>
                <p><strong>Keterangan:</strong> <?= $keterangan ?></p>
                <p><strong>Perhitungan:</strong> <?= $perhitungan ?></p>
                <p><strong>Total Tarif:</strong> <span style="font-size: 18px; color: #2c3e50;">Rp <?= number_format($tarifTotal, 0, ',', '.') ?></span></p>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Jarak Tempuh (km):</label>
                <input type="number" name="jarak_tempuh" min="0.1" step="0.1" required value="<?= $_POST['jarak_tempuh'] ?? '' ?>" placeholder="Contoh: 2.5">
            </div>
            <button type="submit" name="hitung_tarif">Hitung Tarif</button>
        </form>
    </div>
</body>
</html>