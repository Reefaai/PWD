<?php
// latihan7_filter_input.php
// Tujuan: Menunjukkan cara menggunakan filter_input untuk validasi dan sanitasi yang rapi.
$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');
$email = '';
$website = '';
$nama = '';
$errors = [];

if ($submitted) {
    // Ambil dan validasi email
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = 'Email tidak valid';
    }
    
    // Ambil dan validasi URL
    $website = filter_input(INPUT_POST, 'website', FILTER_VALIDATE_URL);
    if ($website === false) {
        $errors['website'] = 'URL tidak valid (sertakan http/https)';
    }
    
    // Sanitasi nama: hilangkan tag & karakter berbahaya
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 7 - filter_input</title>
</head>
<body>
    <h1>Latihan 7 — filter_input() & Sanitasi</h1>
    
    <form method="post">
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?= $submitted && $email!==false ? htmlspecialchars($email, ENT_QUOTES, 'UTF-8') : '' ?>">
            <?php if (isset($errors['email'])): ?>
                <small style="color:#b00020;"><?= htmlspecialchars($errors['email']) ?></small>
            <?php endif; ?>
        </div>
        <div>
            <label>Website</label>
            <input type="url" name="website" value="<?= $submitted && $website!==false ? htmlspecialchars($website, ENT_QUOTES, 'UTF-8') : '' ?>">
            <?php if (isset($errors['website'])): ?>
                <small style="color:#b00020;"><?= htmlspecialchars($errors['website']) ?></small>
            <?php endif; ?>
        </div>
        <button type="submit">Kirim</button>
    </form>
    
    <?php if ($submitted && empty($errors)): ?>
        <h2>Hasil</h2>
        <p>Halo, <strong><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></strong>! 
        Email Anda: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>, 
        Website: <?= htmlspecialchars($website, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
</body>
</html>