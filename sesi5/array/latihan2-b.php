<?php
// latihan2b_kelulusan_nilai_akhir.php
// Latihan 2B - Penentuan Kelulusan dengan Nilai Akhir

if (isset($_POST['hitung_nilai_akhir'])) {
    $kehadiran = (float)$_POST['nilai_kehadiran'];
    $tugas = (float)$_POST['nilai_tugas'];
    $uts = (float)$_POST['nilai_uts'];
    $uas = (float)$_POST['nilai_uas'];
    
    if ($kehadiran >= 0 && $kehadiran <= 100 && $tugas >= 0 && $tugas <= 100 && 
        $uts >= 0 && $uts <= 100 && $uas >= 0 && $uas <= 100) {
        
        // Formula: 10% Kehadiran + 20% Tugas + 30% UTS + 40% UAS
        $nilaiAkhir = (0.1 * $kehadiran) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
        
        if ($nilaiAkhir >= 85) {
            $status = "Lulus";
            $predikat = "A";
            $warna = "#4caf50";
        } elseif ($nilaiAkhir >= 75) {
            $status = "Lulus";
            $predikat = "B";
            $warna = "#4caf50";
        } elseif ($nilaiAkhir >= 65) {
            $status = "Lulus";
            $predikat = "C";
            $warna = "#4caf50";
        } else {
            $status = "Remedial";
            $predikat = "-";
            $warna = "#ff9800";
        }
    } else {
        $error = "Semua nilai harus antara 0-100!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2B - Kelulusan Nilai Akhir</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
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
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #3498db; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Latihan 2B - Penentuan Kelulusan dengan Nilai Akhir</h1>
        
        <div class="info">
            <strong>Formula:</strong> Nilai Akhir = (10% × Kehadiran) + (20% × Tugas) + (30% × UTS) + (40% × UAS)<br>
            <strong>Ketentuan:</strong><br>
            • Nilai Akhir ≥ 85 → Lulus (Predikat A)<br>
            • Nilai Akhir ≥ 75 → Lulus (Predikat B)<br>
            • Nilai Akhir ≥ 65 → Lulus (Predikat C)<br>
            • Nilai Akhir < 60 → Remedial
        </div>

        <?php if (isset($nilaiAkhir)): ?>
            <div class="result" style="border-color: <?= $warna ?>">
                <h3>Hasil Perhitungan Nilai Akhir:</h3>
                <table>
                    <tr><th>Komponen</th><th>Nilai</th><th>Bobot</th><th>Kontribusi</th></tr>
                    <tr><td>Kehadiran</td><td><?= $kehadiran ?></td><td>10%</td><td><?= number_format(0.1 * $kehadiran, 2) ?></td></tr>
                    <tr><td>Tugas</td><td><?= $tugas ?></td><td>20%</td><td><?= number_format(0.2 * $tugas, 2) ?></td></tr>
                    <tr><td>UTS</td><td><?= $uts ?></td><td>30%</td><td><?= number_format(0.3 * $uts, 2) ?></td></tr>
                    <tr><td>UAS</td><td><?= $uas ?></td><td>40%</td><td><?= number_format(0.4 * $uas, 2) ?></td></tr>
                    <tr><th colspan="3">Nilai Akhir</th><th><?= number_format($nilaiAkhir, 2) ?></th></tr>
                </table>
                <p><strong>Status:</strong> <span style="color: <?= $warna ?>"><?= $status ?></span></p>
                <p><strong>Predikat:</strong> <?= $predikat ?></p>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Nilai Kehadiran (0-100):</label>
                <input type="number" name="nilai_kehadiran" min="0" max="100" step="0.1" required value="<?= $_POST['nilai_kehadiran'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Nilai Tugas (0-100):</label>
                <input type="number" name="nilai_tugas" min="0" max="100" step="0.1" required value="<?= $_POST['nilai_tugas'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Nilai UTS (0-100):</label>
                <input type="number" name="nilai_uts" min="0" max="100" step="0.1" required value="<?= $_POST['nilai_uts'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Nilai UAS (0-100):</label>
                <input type="number" name="nilai_uas" min="0" max="100" step="0.1" required value="<?= $_POST['nilai_uas'] ?? '' ?>">
            </div>
            <button type="submit" name="hitung_nilai_akhir">Hitung Nilai Akhir</button>
        </form>
    </div>
</body>
</html>