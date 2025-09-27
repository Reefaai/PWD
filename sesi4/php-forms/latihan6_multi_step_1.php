<?php
// latihan6_multi_step_1.php
// Mulai session untuk menyimpan data antar langkah
session_start();

// Ambil nilai lama jika ada (agar sticky)
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simpan ke session (disarankan lakukan validasi sederhana juga)
    $_SESSION['nama'] = trim($_POST['nama'] ?? '');
    $_SESSION['email'] = trim($_POST['email'] ?? '');
    
    // Pindah ke langkah 2
    header('Location: latihan6_multi_step_2.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 6 - Langkah 1</title>
</head>
<body>
    <h1>Latihan 6 — Langkah 1</h1>
    
    <form method="post">
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <button type="submit">Lanjut</button>
    </form>
</body>
</html>