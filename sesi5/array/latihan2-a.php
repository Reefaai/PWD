<?php
// latihan2a_kelulusan_sederhana.php
// Latihan 2A - Penentuan Kelulusan Ujian Sederhana

if (isset($_POST['cek_lulus'])) {
    $nilai = (float)$_POST['nilai'];
    
    if ($nilai >= 0 && $nilai <= 100) {
        if ($nilai >= 80) {
            $status = "Lulus";
            $predikat = "A";
            $warna = "#4caf50";
        } elseif ($nilai >= 70) {
            $status = "Lulus";
            $predikat = "B";
            $warna = "#4caf50";
        } elseif ($nilai >= 60) {
            $status = "Lulus";
            $predikat = "C";
            $warna = "#4caf50";
        } else {
            $status = "Tidak Lulus";
            $predikat = "-";
            $warna = "#f44336";
        }
    } else {
        $error = "Nilai harus antara 0-100!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2A - Kelulusan Ujian Sederhana</title>
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
        <h1>Latihan 2A - Penentuan Kelulusan Ujian</h1>
        
        <div class="info">
            <strong>Ketentuan Kelulusan:</strong><br>
            • Nilai ≥ 80 → Lulus (Predikat A)<br>
            • Nilai ≥ 70 → Lulus (Predikat B)<br>
            • Nilai ≥ 60 → Lulus (Predikat C)<br>
            • Nilai < 60 → Tidak Lulus
        </div>

        <?php if (isset($status)): ?>
            <div class="result" style="border-color: <?= $warna ?>">
                <h3>Hasil Kelulusan:</h3>
                <p><strong>Nilai:</strong> <?= $nilai ?></p>
                <p><strong>Status:</strong> <span style="color: <?= $warna ?>"><?= $status ?></span></p>
                <p><strong>Predikat:</strong> <?= $predikat ?></p>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Nilai Ujian (0-100):</label>
                <input type="number" name="nilai" min="0" max="100" step="0.1" required value="<?= $_POST['nilai'] ?? '' ?>">
            </div>
            <button type="submit" name="cek_lulus">Cek Kelulusan</button>
        </form>
    </div>
</body>
</html>