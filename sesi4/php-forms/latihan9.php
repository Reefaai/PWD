<?php
// latihan9_validasi_lanjutan.php
// Tujuan: Menambahkan contoh validasi pola regex, panjang minimal/maksimal, dan blacklist kata.
$errors = [];
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$catatan = $_POST['catatan'] ?? '';
$forbidden = ['spam', 'iklan']; // contoh daftar kata terlarang

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($username);
    $password = trim($password);
    $catatan = trim($catatan);
    
    // Username: 4-12, alphanumeric saja
    if (!preg_match('/^[a-zA-Z0-9]{4,12}$/', $username)) {
        $errors['username'] = 'Username 4–12 karakter alfanumerik';
    }
    
    // Password: minimal 8 (contoh sederhana; untuk produksi gunakan hashing, dsb.)
    if (mb_strlen($password) < 8) {
        $errors['password'] = 'Password minimal 8 karakter';
    }
    
    // Catatan: maks 200
    if (mb_strlen($catatan) > 200) {
        $errors['catatan'] = 'Catatan maksimal 200 karakter';
    }
    
    // Blacklist sederhana
    foreach ($forbidden as $bad) {
        if (stripos($catatan, $bad) !== false) {
            $errors['catatan'] = 'Catatan mengandung kata terlarang: ' . $bad;
            break;
        }
    }
    
    $ok = empty($errors);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 9 - Validasi Lanjutan</title>
    <style>.err{color:#b00020}</style>
</head>
<body>
    <h1>Latihan 9 — Validasi Lanjutan</h1>
    
    <form method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errors['username'])): ?>
                <span class="err"><?= htmlspecialchars($errors['username']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value=""> <!-- jangan sticky untuk keamanan -->
            <?php if (isset($errors['password'])): ?>
                <span class="err"><?= htmlspecialchars($errors['password']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Catatan</label>
            <textarea name="catatan" rows="3"><?= htmlspecialchars($catatan, ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (isset($errors['catatan'])): ?>
                <span class="err"><?= htmlspecialchars($errors['catatan']) ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Kirim</button>
    </form>
    
    <?php if (!empty($ok) && $ok): ?>
        <p><strong>Semua valid!</strong></p>
    <?php endif; ?>
</body>
</html>