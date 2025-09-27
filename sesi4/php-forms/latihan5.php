<?php
// latihan5_upload.php
// Tujuan: Mengunggah gambar dengan validasi tipe & ukuran, lalu menyimpannya ke folder uploads.

// Buat folder uploads jika belum ada
$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

$pesan = '';
$previewPath = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan field file ada dan tidak terjadi error bawaan PHP
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        $pesan = 'Upload gagal, coba lagi.';
    } else {
        $fileTmp = $_FILES['gambar']['tmp_name'];
        $fileSize = $_FILES['gambar']['size'];
        
        // Batas ukuran 2 MB
        $maxSize = 2 * 1024 * 1024;
        if ($fileSize > $maxSize) {
            $pesan = 'Ukuran file melebihi 2MB.';
        } else {
            // Validasi MIME menggunakan finfo (lebih aman daripada hanya cek ekstensi)
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($fileTmp);
            $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
            
            if (!isset($allowed[$mime])) {
                $pesan = 'Hanya izinkan JPG atau PNG.';
            } else {
                // Buat nama file acak agar tidak bentrok
                $ext = $allowed[$mime];
                $newName = bin2hex(random_bytes(8)) . '.' . $ext;
                $destPath = $uploadDir . '/' . $newName;
                
                // Pindahkan file dari tmp ke folder uploads
                if (move_uploaded_file($fileTmp, $destPath)) {
                    $pesan = 'Upload berhasil!';
                    // Simpan path relatif untuk preview di HTML
                    $previewPath = 'uploads/' . $newName;
                } else {
                    $pesan = 'Gagal menyimpan file.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 5 - Upload Gambar</title>
</head>
<body>
    <h1>Latihan 5 — Upload Gambar Sederhana</h1>
    
    <form method="post" enctype="multipart/form-data">
        <label for="gambar">Pilih Gambar (JPG/PNG, maks 2MB)</label>
        <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png">
        <button type="submit">Upload</button>
    </form>
    
    <?php if ($pesan): ?>
        <p><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
    
    <?php if ($previewPath): ?>
        <h2>Preview</h2>
        <img src="<?= htmlspecialchars($previewPath, ENT_QUOTES, 'UTF-8') ?>" alt="Preview" style="max-width:300px; height:auto;">
    <?php endif; ?>
</body>
</html>