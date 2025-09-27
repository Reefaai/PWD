<?php
// latihan3.php
// Tujuan: Menambahkan validasi server-side dan menampilkan pesan error.
$errors = [];
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$pesan = $_POST['pesan'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trim spasi berlebih
    $nama = trim($nama);
    $email = trim($email);
    $pesan = trim($pesan);
    
    // Validasi nama
    if ($nama === '') {
        $errors['nama'] = 'Nama wajib diisi';
    } elseif (mb_strlen($nama) < 3) {
        $errors['nama'] = 'Nama minimal 3 karakter';
    }
    
    // Validasi email
    if ($email === '') {
        $errors['email'] = 'Email wajib diisi';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid';
    }
    
    // Validasi pesan
    if ($pesan === '') {
        $errors['pesan'] = 'Pesan wajib diisi';
    } elseif (mb_strlen($pesan) < 10) {
        $errors['pesan'] = 'Pesan minimal 10 karakter';
    }
    
    // Jika tidak ada error, set flag sukses
    $success = empty($errors);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 - Validasi Dasar</title>
    <style>
        .error { color: #b00020; }
    </style>
</head>
<body>
    <h1>Latihan 3 — Validasi Dasar & Sticky Form</h1>
    
    <?php if (!empty($success) && $success): ?>
        <p><strong>Form berhasil dikirim!</strong></p>
    <?php endif; ?>
    
    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errors['nama'])): ?>
                <div class="error"><?= htmlspecialchars($errors['nama']) ?></div>
            <?php endif; ?>
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="error"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
        </div>
        
        <div>
            <label for="pesan">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4"><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') ?></textarea>
            <?php if (isset($errors['pesan'])): ?>
                <div class="error"><?= htmlspecialchars($errors['pesan']) ?></div>
            <?php endif; ?>
        </div>
        
        <button type="submit">Kirim</button>
    </form>
</body>
</html>