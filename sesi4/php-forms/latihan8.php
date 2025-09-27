<?php
// latihan8_csrf.php
// Tujuan: Menambahkan token CSRF sederhana menggunakan session untuk mencegah submit lintas situs.
session_start();

// Generate token saat pertama kali load (GET) atau jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
}

$info = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil token dari POST dan bandingkan dengan yang ada di session
    $tokenPost = $_POST['csrf_token'] ?? '';
    if (hash_equals($_SESSION['csrf_token'], $tokenPost)) {
        $info = 'Token valid. Form diproses.';
        // (Lakukan proses form lainnya di sini)
        // (Opsional) Rotasi token setelah sukses
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    } else {
        $info = 'Token CSRF tidak valid! Pengiriman ditolak.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 8 - CSRF</title>
</head>
<body>
    <h1>Latihan 8 — CSRF Token Dasar</h1>
    
    <?php if ($info): ?>
        <p><?= htmlspecialchars($info, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    
    <form method="post">
        <label>Contoh Field</label>
        <input type="text" name="contoh" placeholder="isian apapun">
        
        <!-- Sisipkan token sebagai hidden input -->
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
        
        <button type="submit">Kirim</button>
    </form>
</body>
</html>