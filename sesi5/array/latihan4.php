<?php
// latihan4_kategori_umur.php
// Latihan 4 - Penentuan Kategori Umur

if (isset($_POST['cek_kategori'])) {
    $usia = (int)$_POST['usia'];
    
    if ($usia > 0 && $usia <= 150) {
        if ($usia < 17) {
            $kategori = "Anak-anak";
            $warna = "#ff9800";
            $deskripsi = "Masa pertumbuhan dan perkembangan fisik serta mental";
        } elseif ($usia >= 17 && $usia <= 30) {
            $kategori = "Remaja";
            $warna = "#4caf50";
            $deskripsi = "Masa transisi menuju kedewasaan";
        } elseif ($usia >= 31 && $usia <= 59) {
            $kategori = "Dewasa";
            $warna = "#2196f3";
            $deskripsi = "Masa produktif dengan tanggung jawab penuh";
        } else {
            $kategori = "Lansia";
            $warna = "#9c27b0";
            $deskripsi = "Masa senior dengan pengalaman hidup yang kaya";
        }
    } else {
        $error = "Usia harus valid (1-150 tahun)!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4 - Kategori Umur</title>
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
        <h1>Latihan 4 - Penentuan Kategori Umur</h1>
        
        <div class="info">
            <strong>Kategori Umur:</strong><br>
            • Usia < 17 tahun → Anak-anak<br>
            • Usia 17-30 tahun → Remaja<br>
            • Usia 31-59 tahun → Dewasa<br>
            • Usia ≥ 60 tahun → Lansia
        </div>

        <?php if (isset($kategori)): ?>
            <div class="result" style="border-color: <?= $warna ?>">
                <h3>Hasil Penentuan Kategori:</h3>
                <p><strong>Usia:</strong> <?= $usia ?> tahun</p>
                <p><strong>Kategori:</strong> <span style="color: <?= $warna ?>; font-size: 18px;"><?= $kategori ?></span></p>
                <p><strong>Deskripsi:</strong> <?= $deskripsi ?></p>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Usia (tahun):</label>
                <input type="number" name="usia" min="1" max="150" required value="<?= $_POST['usia'] ?? '' ?>" placeholder="Masukkan usia">
            </div>
            <button type="submit" name="cek_kategori">Cek Kategori</button>
        </form>
    </div>
</body>
</html>