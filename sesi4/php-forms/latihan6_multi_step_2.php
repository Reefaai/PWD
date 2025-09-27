<?php
// latihan6_multi_step_2.php
session_start();

$alamat = $_SESSION['alamat'] ?? '';
$telp = $_SESSION['telp'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['alamat'] = trim($_POST['alamat'] ?? '');
    $_SESSION['telp'] = trim($_POST['telp'] ?? '');
    
    header('Location: latihan6_result.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 6 - Langkah 2</title>
</head>
<body>
    <h1>Latihan 6 — Langkah 2</h1>
    
    <form method="post">
        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= htmlspecialchars($alamat, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div>
            <label>No. Telp</label>
            <input type="text" name="telp" value="<?= htmlspecialchars($telp, ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <button type="submit">Selesai</button>
    </form>
</body>
</html>