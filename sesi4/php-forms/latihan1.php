<?php
// latihan1.php
// Tujuan: Menangkap nama lewat method GET dan menampilkan sapaan.
// Ambil nilai 'nama' dari query string (jika ada), jika tidak ada set kosong
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
// Amankan output dengan htmlspecialchars agar karakter spesial tidak dieksekusi sebagai HTML
$sapaan = $nama !== '' ? 'Halo, ' . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') . '!' : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1 - Form GET</title>
</head>
<body>
    <h1>Latihan 1 — Form GET Sederhana</h1>
    <!-- Form menggunakan method GET, action ke halaman ini sendiri -->
    <form method="get" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit">Sapa Saya</button>
    </form>
    
    <!-- Tampilkan sapaan jika nama terisi -->
    <?php if ($sapaan): ?>
        <p><?= $sapaan ?></p>
    <?php endif; ?>
</body>
</html>