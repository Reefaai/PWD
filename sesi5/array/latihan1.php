<?php
// latihan1_diskon.php
// Latihan 1 - Hitung Diskon Total Belanja

// Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        return 0.10; // 10%
    } elseif ($totalBelanja >= 50000) {
        return 0.05; // 5%
    } else {
        return 0; // 0%
    }
}

// Prosedur untuk menampilkan hasil
function tampilkanHasilDiskon($jumlahBarang, $hargaBarang, $totalBelanja, $persenDiskon, $nominalDiskon, $totalBayar) {
    echo "<div class='result'>";
    echo "<h3>Hasil Perhitungan:</h3>";
    echo "<table>";
    echo "<tr><th>Keterangan</th><th>Nilai</th></tr>";
    echo "<tr><td>Jumlah Barang</td><td>$jumlahBarang item</td></tr>";
    echo "<tr><td>Harga per Barang</td><td>Rp " . number_format($hargaBarang, 0, ',', '.') . "</td></tr>";
    echo "<tr><td>Total Belanja</td><td>Rp " . number_format($totalBelanja, 0, ',', '.') . "</td></tr>";
    echo "<tr><td>Persentase Diskon</td><td>" . ($persenDiskon * 100) . "%</td></tr>";
    echo "<tr><td>Nominal Diskon</td><td>Rp " . number_format($nominalDiskon, 0, ',', '.') . "</td></tr>";
    echo "<tr><th>Total yang harus dibayar</th><th>Rp " . number_format($totalBayar, 0, ',', '.') . "</th></tr>";
    echo "</table>";
    echo "</div>";
}

if (isset($_POST['hitung_diskon'])) {
    $jumlahBarang = (int)$_POST['jumlah_barang'];
    $hargaBarang = (float)$_POST['harga_barang'];
    
    if ($jumlahBarang > 0 && $hargaBarang > 0) {
        $totalBelanja = $jumlahBarang * $hargaBarang;
        $persenDiskon = hitungDiskon($totalBelanja);
        $nominalDiskon = $totalBelanja * $persenDiskon;
        $totalBayar = $totalBelanja - $nominalDiskon;
        
        tampilkanHasilDiskon($jumlahBarang, $hargaBarang, $totalBelanja, $persenDiskon, $nominalDiskon, $totalBayar);
    } else {
        echo "<div class='error'>Mohon masukkan nilai yang valid!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1 - Hitung Diskon</title>
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
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #3498db; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Latihan 1 - Hitung Diskon Total Belanja</h1>
        
        <div class="info">
            <strong>Ketentuan Diskon:</strong><br>
            • Total ≥ Rp 100.000 → Diskon 10%<br>
            • Total ≥ Rp 50.000 (< Rp 100.000) → Diskon 5%<br>
            • Total < Rp 50.000 → Tidak ada diskon
        </div>

        <form method="post">
            <div class="form-group">
                <label>Jumlah Barang:</label>
                <input type="number" name="jumlah_barang" min="1" required value="<?= $_POST['jumlah_barang'] ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Harga per Barang (Rp):</label>
                <input type="number" name="harga_barang" min="1" required value="<?= $_POST['harga_barang'] ?? '' ?>">
            </div>
            <button type="submit" name="hitung_diskon">Hitung Diskon</button>
        </form>
    </div>
</body>
</html>