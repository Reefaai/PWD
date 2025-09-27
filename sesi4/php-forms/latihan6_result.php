<?php
// latihan6_result.php
session_start();

// Ambil semua data dari session
$data = [
    'nama' => $_SESSION['nama'] ?? '',
    'email' => $_SESSION['email'] ?? '',
    'alamat' => $_SESSION['alamat'] ?? '',
    'telp' => $_SESSION['telp'] ?? '',
];

// Reset session jika diminta
if (isset($_POST['reset'])) {
    session_unset();
    session_destroy();
    header('Location: latihan6_multi_step_1.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 6 - Hasil</title>
</head>
<body>
    <h1>Ringkasan Data</h1>
    
    <ul>
        <?php foreach ($data as $k => $v): ?>
            <li><?= htmlspecialchars($k) ?>: <?= htmlspecialchars($v, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
    
    <form method="post">
        <button type="submit" name="reset" value="1">Mulai Lagi</button>
    </form>
</body>
</html>