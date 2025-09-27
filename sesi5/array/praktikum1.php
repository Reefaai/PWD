<?php
// praktikum1_menu_restoran.php
// Soal Praktikum Switch 1 - Menu Restoran

if (isset($_POST['pilih_menu'])) {
    $pilihan = (int)$_POST['menu_pilihan'];
    
    switch ($pilihan) {
        case 1:
            $namaMenu = "Nasi Goreng";
            $harga = 15000;
            break;
        case 2:
            $namaMenu = "Mie Goreng";
            $harga = 12000;
            break;
        case 3:
            $namaMenu = "Ayam Bakar";
            $harga = 20000;
            break;
        case 4:
            $namaMenu = "Ikan Bakar";
            $harga = 18000;
            break;
        default:
            $namaMenu = null;
            $harga = 0;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Switch 1 - Menu Restoran</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); }
        h1 { color: #2c3e50; text-align: center; margin-bottom: 30px; }
        .menu-list { background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .menu-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dotted #ccc; }
        .menu-item:last-child { border-bottom: none; }
        .menu-name { font-weight: bold; }
        .menu-price { color: #28a745; font-weight: bold; }
        form { background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .form-group { margin: 15px 0; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #2c3e50; }
        select { width: 100%; padding: 10px; border: 2px solid #ddd; border-radius: 6px; font-size: 16px; }
        button { background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); }
        .result { background: linear-gradient(45deg, #56ab2f, #a8e6cf); color: white; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center; }
        .error { background: linear-gradient(45deg, #ff416c, #ff4b2b); color: white; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: center; }
        .result h3, .error h3 { margin-top: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🍽️ Menu Restoran</h1>
        
        <div class="menu-list">
            <h3 style="margin-top: 0; color: #2c3e50;">📋 Daftar Menu</h3>
            <div class="menu-item">
                <span class="menu-name">1. Nasi Goreng</span>
                <span class="menu-price">Rp 15.000</span>
            </div>
            <div class="menu-item">
                <span class="menu-name">2. Mie Goreng</span>
                <span class="menu-price">Rp 12.000</span>
            </div>
            <div class="menu-item">
                <span class="menu-name">3. Ayam Bakar</span>
                <span class="menu-price">Rp 20.000</span>
            </div>
            <div class="menu-item">
                <span class="menu-name">4. Ikan Bakar</span>
                <span class="menu-price">Rp 18.000</span>
            </div>
        </div>

        <?php if (isset($namaMenu) && $namaMenu): ?>
            <div class="result">
                <h3>✅ Pesanan Anda</h3>
                <p><strong>Nomor Menu:</strong> <?= $pilihan ?></p>
                <p><strong>Nama Menu:</strong> <?= $namaMenu ?></p>
                <p><strong>Harga:</strong> Rp <?= number_format($harga, 0, ',', '.') ?></p>
                <p style="font-size: 14px; margin-top: 20px;">Terima kasih telah memesan! 🎉</p>
            </div>
        <?php elseif (isset($_POST['pilih_menu'])): ?>
            <div class="error">
                <h3>❌ Error</h3>
                <p>Pilihan menu tidak valid! Silakan pilih menu 1-4.</p>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label>Pilih Menu:</label>
                <select name="menu_pilihan" required>
                    <option value="">-- Pilih Menu Favorit Anda --</option>
                    <option value="1" <?= (isset($_POST['menu_pilihan']) && $_POST['menu_pilihan'] == '1') ? 'selected' : '' ?>>1. Nasi Goreng - Rp 15.000</option>
                    <option value="2" <?= (isset($_POST['menu_pilihan']) && $_POST['menu_pilihan'] == '2') ? 'selected' : '' ?>>2. Mie Goreng - Rp 12.000</option>
                    <option value="3" <?= (isset($_POST['menu_pilihan']) && $_POST['menu_pilihan'] == '3') ? 'selected' : '' ?>>3. Ayam Bakar - Rp 20.000</option>
                    <option value="4" <?= (isset($_POST['menu_pilihan']) && $_POST['menu_pilihan'] == '4') ? 'selected' : '' ?>>4. Ikan Bakar - Rp 18.000</option>
                </select>
            </div>
            <button type="submit" name="pilih_menu">🛒 Pesan Menu</button>
        </form>
    </div>
</body>
</html>