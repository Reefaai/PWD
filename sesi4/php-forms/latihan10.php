<?php
// latihan10_pendaftaran.php
// Tujuan: Membangun form pendaftaran yang relatif lengkap dengan validasi, CSRF, dan upload opsional.
session_start();

// Siapkan token CSRF jika belum ada
if (empty($_SESSION['csrf10'])) {
    $_SESSION['csrf10'] = bin2hex(random_bytes(16));
}

function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function checked($cond) { echo $cond ? 'checked' : ''; }
function selected($cond) { echo $cond ? 'selected' : ''; }

$errors = [];
$ok = false;

// Nilai awal (sticky)
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$telp = $_POST['telp'] ?? '';
$prodi = $_POST['prodi'] ?? '';
$minat = $_POST['minat'] ?? [];
$gender = $_POST['gender'] ?? '';
$catatan = $_POST['catatan'] ?? '';
$buktiPath = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifikasi CSRF
    $csrf = $_POST['csrf10'] ?? '';
    if (!hash_equals($_SESSION['csrf10'], $csrf)) {
        $errors['csrf'] = 'Token CSRF tidak valid.';
    }
    
    // Trim
    $nama = trim($nama);
    $email = trim($email);
    $telp = trim($telp);
    $catatan = trim($catatan);
    
    // Validasi
    if ($nama === '' || mb_strlen($nama) < 3) { $errors['nama'] = 'Nama minimal 3 karakter'; }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors['email'] = 'Email tidak valid'; }
    if ($catatan !== '' && mb_strlen($catatan) > 200) { $errors['catatan'] = 'Catatan maksimal 200 karakter'; }
    if ($prodi === '') { $errors['prodi'] = 'Pilih Program Studi'; }
    if (!in_array($gender, ['L','P'])) { $errors['gender'] = 'Pilih gender'; }
    
    // Validasi upload opsional (jika ada file dipilih)
    if (!empty($_FILES['bukti']['name'])) {
        if ($_FILES['bukti']['error'] !== UPLOAD_ERR_OK) {
            $errors['bukti'] = 'Terjadi kesalahan saat upload';
        } else {
            $tmp = $_FILES['bukti']['tmp_name'];
            $size = $_FILES['bukti']['size'];
            $max = 2*1024*1024; // 2MB
            if ($size > $max) {
                $errors['bukti'] = 'Ukuran file melebihi 2MB';
            } else {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($tmp);
                $allowed = ['image/jpeg'=>'jpg', 'image/png'=>'png'];
                if (!isset($allowed[$mime])) {
                    $errors['bukti'] = 'Hanya JPG/PNG yang diizinkan';
                }
            }
        }
    }
    
    // Jika lolos validasi
    if (empty($errors)) {
        // Proses upload jika ada
        if (!empty($_FILES['bukti']['name'])) {
            $uploadDir = __DIR__ . '/uploads';
            if (!is_dir($uploadDir)) { mkdir($uploadDir, 0775, true); }
            $ext = ['image/jpeg'=>'jpg', 'image/png'=>'png'][ (new finfo(FILEINFO_MIME_TYPE))->file($_FILES['bukti']['tmp_name']) ];
            $newName = 'bukti_' . bin2hex(random_bytes(6)) . '.' . $ext;
            $dest = $uploadDir . '/' . $newName;
            if (move_uploaded_file($_FILES['bukti']['tmp_name'], $dest)) {
                $buktiPath = 'uploads/' . $newName;
            }
        }
        $ok = true;
        // Rotasi token agar tidak bisa di-replay
        $_SESSION['csrf10'] = bin2hex(random_bytes(16));
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 10 - Pendaftaran Workshop</title>
    <style>.err{color:#b00020}</style>
</head>
<body>
    <h1>Pendaftaran Workshop</h1>
    
    <?php if ($ok): ?>
        <p><strong>Pendaftaran berhasil!</strong> Berikut ringkasan data Anda:</p>
        <ul>
            <li>Nama: <?= h($nama) ?></li>
            <li>Email: <?= h($email) ?></li>
            <li>Telp: <?= h($telp) ?></li>
            <li>Prodi: <?= h($prodi) ?></li>
            <li>Gender: <?= h($gender) ?></li>
            <li>Minat: <?= h(implode(', ', (array)$minat)) ?></li>
            <li>Catatan: <?= h($catatan) ?></li>
            <?php if ($buktiPath): ?><li>Bukti: <a href="<?= h($buktiPath) ?>" target="_blank">Lihat</a></li><?php endif; ?>
        </ul>
    <?php endif; ?>
    
    <form method="post" enctype="multipart/form-data">
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="<?= h($nama) ?>">
            <?php if (isset($errors['nama'])): ?><span class="err"><?= h($errors['nama']) ?></span><?php endif; ?>
        </div>
        
        <div>
            <label>Email</label>
            <input type="email" name="email" value="<?= h($email) ?>">
            <?php if (isset($errors['email'])): ?><span class="err"><?= h($errors['email']) ?></span><?php endif; ?>
        </div>
        
        <div>
            <label>Telepon</label>
            <input type="text" name="telp" value="<?= h($telp) ?>" placeholder="contoh: 0812-xxx atau +62">
        </div>
        
        <div>
            <label>Program Studi</label>
            <select name="prodi">
                <option value="">-- Pilih --</option>
                <option value="TI" <?php selected($prodi==='TI'); ?>>Teknik Informatika</option>
                <option value="SI" <?php selected($prodi==='SI'); ?>>Sistem Informasi</option>
                <option value="RPL" <?php selected($prodi==='RPL'); ?>>Rekayasa Perangkat Lunak</option>
                <option value="MI" <?php selected($prodi==='MI'); ?>>Manajemen Informatika</option>
            </select>
            <?php if (isset($errors['prodi'])): ?><span class="err"><?= h($errors['prodi']) ?></span><?php endif; ?>
        </div>
        
        <fieldset>
            <legend>Gender</legend>
            <label><input type="radio" name="gender" value="L" <?php checked($gender==='L'); ?>> Laki-laki</label>
            <label><input type="radio" name="gender" value="P" <?php checked($gender==='P'); ?>> Perempuan</label>
            <?php if (isset($errors['gender'])): ?><span class="err"><?= h($errors['gender']) ?></span><?php endif; ?>
        </fieldset>
        
        <fieldset>
            <legend>Minat (boleh pilih beberapa)</legend>
            <?php $opsi = ['UI/UX','Backend','Frontend','Data']; ?>
            <?php foreach ($opsi as $o): ?>
                <label><input type="checkbox" name="minat[]" value="<?= h($o) ?>" <?php checked(in_array($o, (array)$minat)); ?>> <?= h($o) ?></label>
            <?php endforeach; ?>
        </fieldset>
        
        <div>
            <label>Catatan (maks 200)</label>
            <textarea name="catatan" rows="3"><?= h($catatan) ?></textarea>
            <?php if (isset($errors['catatan'])): ?><span class="err"><?= h($errors['catatan']) ?></span><?php endif; ?>
        </div>
        
        <div>
            <label>Bukti (opsional, JPG/PNG ≤ 2MB)</label>
            <input type="file" name="bukti" accept="image/jpeg,image/png">
            <?php if (isset($errors['bukti'])): ?><span class="err"><?= h($errors['bukti']) ?></span><?php endif; ?>
        </div>
        
        <!-- Token CSRF -->
        <input type="hidden" name="csrf10" value="<?= h($_SESSION['csrf10']) ?>">
        
        <button type="submit">Daftar</button>
    </form>
</body>
</html>