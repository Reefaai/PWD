<?php
// latihan2.php
// Tujuan: Menangkap biodata dasar via POST dan menampilkannya kembali dengan aman.
// Inisialisasi variabel untuk menampung nilai awal (agar sticky)
$nama = $_POST['nama'] ?? '';
$usia = $_POST['usia'] ?? '';
$email = $_POST['email'] ?? '';
// Cek apakah form disubmit: ada kunci 'submit'
$submitted = isset($_POST['submit']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 - Form POST</title>
</head>
<body>
    <h1>Latihan 2 — Biodata Sederhana</h1>
    
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div>
            <label for="usia">Usia</label>
            <input type="number" id="usia" name="usia" value="<?= htmlspecialchars($usia, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <button type="submit" name="submit" value="1">Kirim</button>
    </form>
    
    <?php if ($submitted): ?>
        <h2>Hasil</h2>
        <ul>
            <li>Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></li>
            <li>Usia: <?= htmlspecialchars($usia, ENT_QUOTES, 'UTF-8') ?></li>
            <li>Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></li>
        </ul>
    <?php endif; ?>
</body>
</html>