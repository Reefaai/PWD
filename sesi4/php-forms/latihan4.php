<?php
// latihan4.php
// Tujuan: Memproses input pilihan (radio, checkbox[], select) dan menampilkannya kembali.
$gender = $_POST['gender'] ?? '';
$hobi = $_POST['hobi'] ?? [];
$jurusan = $_POST['jurusan'] ?? '';
$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

// Helper untuk "checked" radio & checkbox serta "selected" option
function checked($cond) { echo $cond ? 'checked' : ''; }
function selected($cond) { echo $cond ? 'selected' : ''; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4 - Pilihan</title>
</head>
<body>
    <h1>Latihan 4 — Radio, Checkbox, Select</h1>
    
    <form method="post" action="<?= h($_SERVER['PHP_SELF']) ?>">
        <fieldset>
            <legend>Gender (radio)</legend>
            <label><input type="radio" name="gender" value="L" <?php checked($gender==='L'); ?>> Laki-laki</label>
            <label><input type="radio" name="gender" value="P" <?php checked($gender==='P'); ?>> Perempuan</label>
        </fieldset>
        
        <fieldset>
            <legend>Hobi (boleh lebih dari satu)</legend>
            <label><input type="checkbox" name="hobi[]" value="Membaca" <?php checked(in_array('Membaca', $hobi)); ?>> Membaca</label>
            <label><input type="checkbox" name="hobi[]" value="Olahraga" <?php checked(in_array('Olahraga', $hobi)); ?>> Olahraga</label>
            <label><input type="checkbox" name="hobi[]" value="Game" <?php checked(in_array('Game', $hobi)); ?>> Game</label>
        </fieldset>
        
        <div>
            <label for="jurusan">Jurusan (select)</label>
            <select id="jurusan" name="jurusan">
                <option value="">-- Pilih --</option>
                <option value="TI" <?php selected($jurusan==='TI'); ?>>Teknik Informatika</option>
                <option value="SI" <?php selected($jurusan==='SI'); ?>>Sistem Informasi</option>
                <option value="RPL" <?php selected($jurusan==='RPL'); ?>>Rekayasa Perangkat Lunak</option>
            </select>
        </div>
        
        <button type="submit">Kirim</button>
    </form>
    
    <?php if ($submitted): ?>
        <h2>Hasil</h2>
        <ul>
            <li>Gender: <?= h($gender) ?></li>
            <li>Hobi: <?= h(implode(', ', $hobi)) ?></li>
            <li>Jurusan: <?= h($jurusan) ?></li>
        </ul>
    <?php endif; ?>
</body>
</html>