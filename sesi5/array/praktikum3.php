<?php
// praktikum3_hari_dalam_bulan.php
// Soal Praktikum Switch 3 - Jumlah Hari dalam Sebulan

function cekTahunKabisat($tahun) {
    return ($tahun % 4 == 0 && $tahun % 100 != 0) || ($tahun % 400 == 0);
}

if (isset($_POST['cek_hari_bulan'])) {
    $nomorBulan = (int)$_POST['nomor_bulan'];
    $tahun = (int)$_POST['tahun'];
    
    $namaBulan = [
        1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April",
        5 => "Mei", 6 => "Juni", 7 => "Juli", 8 => "Agustus",
        9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember"
    ];
    
    switch ($nomorBulan) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $jumlahHari = 31;
            $kategori = "Bulan dengan 31 hari";
            $warna = "#2ecc71";
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            $jumlahHari = 30;
            $kategori = "Bulan dengan 30 hari";
            $warna = "#3498db";
            break;
        case 2:
            if (cekTahunKabisat($tahun)) {
                $jumlahHari = 29;
                $keteranganKabisat = "Tahun $tahun adalah tahun kabisat";
                $kategori = "Februari (Tahun Kabisat)";
                $warna = "#e74c3c";
            } else {
                $jumlahHari = 28;
                $keteranganKabisat = "Tahun $tahun bukan tahun kabisat";
                $kategori = "Februari (Tahun Biasa)";
                $warna = "#f39c12";
            }
            break;
        default:
            $jumlahHari = 0;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Switch 3 - Jumlah Hari dalam Bulan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); min-height: 100vh; }
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
        .info { background: #e3f2fd; border-left: 4px solid #2196f3; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .month-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 10px; margin: 20px 0; }
        .month-card { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; padding: 10px; text-align: center; }
        .month-31 { background: #d4edda; border-color: #c3e6cb; }
        .month-30 { background: #cce5ff; border-color: #b3d4ff; }
        .month-feb { background: #fff3cd; border-color: #ffeaa7; }
        form { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .form-row { display: flex; gap: 20px; align-items: end; }
        .form-group { flex: 1; margin: 15px 0; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #2c3e50; }
        select, input { width: 100%; padding: 12px; border: 2px solid #ddd; border-radius: 6px; font-size: 16px; }
        button { background: linear-gradient(45deg, #a8edea, #fed6e3); color: #2c3e50; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(168, 237, 234, 0.4); }
        .result { background: #e8f5e8; border: 2px solid #4caf50; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .error { background: #ffebee; border: 2px solid #f44336; padding: 20px; border-radius: 8px; margin: 20px 0; color: #c62828; }
        .leap-info { background: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; padding: 15px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Jumlah Hari dalam Bulan</h1>
        
        <div class="info">
            <strong>Keterangan:</strong><br>
            • Bulan 1,3,5,7,8,10,12 → 31 hari<br>
            • Bulan 4,6,9,11 → 30 hari<br>
            • Bulan 2 → Tergantung tahun kabisat (28/29 hari)
        </div>

        <div class="month-grid">
            <div class="month-card month-31">Jan (31)</div>
            <div class="month-card month-feb">Feb (28/29)</div>
            <div class="month-card month-31">Mar (31)</div>
            <div class="month-card month-30">Apr (30)</div>
            <div class="month-card month-31">Mei (31)</div>
            <div class="month-card month-30">Jun (30)</div>
            <div class="month-card month-31">Jul (31)</div>
            <div class="month-card month-31">Agu (31)</div>
            <div class="month-card month-30">Sep (30)</div>
            <div class="month-card month-31">Okt (31)</div>
            <div class="month-card month-30">Nov (30)</div>
            <div class="month-card month-31">Des (31)</div>
        </div>

        <?php if (isset($jumlahHari) && $jumlahHari > 0): ?>
            <div class="result">
                <h3>Hasil Pencarian:</h3>
                <p><strong>Bulan:</strong> <?= $namaBulan[$nomorBulan] ?> (<?= $nomorBulan ?>)</p>
                <p><strong>Tahun:</strong> <?= $tahun ?></p>
                <p><strong>Kategori:</strong> <span style="color: <?= $warna ?>"><?= $kategori ?></span></p>
                <p><strong>Jumlah Hari:</strong> <span style="color: <?= $warna ?>; font-size: 24px; font-weight: bold;"><?= $jumlahHari ?> hari</span></p>
                <?php if (isset($keteranganKabisat)): ?>
                    <div class="leap-info">
                        <strong>Info Tahun Kabisat:</strong> <?= $keteranganKabisat ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif (isset($_POST['cek_hari_bulan'])): ?>
            <div class="error">
                <h3>Error: Nomor bulan tidak valid!</h3>
                <p>Masukkan angka 1-12 sesuai dengan bulan yang ada.</p>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label>Bulan:</label>
                    <select name="nomor_bulan" required>
                        <option value="">-- Pilih Bulan --</option>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>" <?= (isset($_POST['nomor_bulan']) && $_POST['nomor_bulan'] == $i) ? 'selected' : '' ?>>
                                <?= $i ?> - <?= ["", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"][$i] ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun:</label>
                    <input type="number" name="tahun" min="1" max="9999" required value="<?= $_POST['tahun'] ?? date('Y') ?>" placeholder="Contoh: 2024">
                </div>
                <div class="form-group">
                    <button type="submit" name="cek_hari_bulan">Cek Jumlah Hari</button>
                </div>
            </div>
        </form>

        <div class="info">
            <strong>Info Tahun Kabisat:</strong><br>
            Tahun kabisat terjadi setiap 4 tahun sekali, kecuali pada tahun yang habis dibagi 100 (bukan kabisat), 
            kecuali juga tahun yang habis dibagi 400 (tetap kabisat).
        </div>
    </div>
</body>
</html>