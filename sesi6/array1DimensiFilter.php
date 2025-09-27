<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Soal 2: Filter Data Produk</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 600px; margin: auto; }
        .form-filter { background-color: #f2f2f2; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .produk-list { list-style-type: none; padding: 0; }
        .produk-item { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .no-result { color: #cc0000; font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h2>Filter Produk Berdasarkan Kategori</h2>

    <?php
    $produk = [
        ["Kaos Polos", 50000, "Pakaian"],
        ["Celana Jeans", 100000, "Pakaian"],
        ["Sepatu Lari", 150000, "Sepatu"],
        ["Buku Pelajaran", 75000, "Buku"],
        ["Tas Sekolah", 60000, "Tas"],
    ];

    $kategoriUnik = array_unique(array_column($produk, 2));
    
    $kategoriFilter = '';
    if (isset($_GET['kategori'])) {
        $kategoriFilter = $_GET['kategori'];
    }
    ?>

    <div class="form-filter">
        <form action="" method="GET">
            <label for="kategori">Pilih Kategori:</label>
            <select name="kategori" id="kategori">
                <option value="">-- Semua Kategori --</option>
                <?php foreach ($kategoriUnik as $kategori): ?>
                    <option value="<?php echo $kategori; ?>" <?php if ($kategori == $kategoriFilter) echo 'selected'; ?>>
                        <?php echo $kategori; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filter</button>
        </form>
    </div>

    <h3>Hasil Filter:</h3>
    
    <?php
    $hasilFilter = [];
    if (!empty($kategoriFilter)) {
        foreach ($produk as $item) {
            if ($item[2] == $kategoriFilter) {
                $hasilFilter[] = $item;
            }
        }
    } else {
        $hasilFilter = $produk;
    }

    if (empty($hasilFilter)) {
        echo "<p class='no-result'>Tidak ada produk yang ditemukan untuk kategori yang dipilih.</p>";
    } else {
        echo "<ul class='produk-list'>";
        foreach ($hasilFilter as $item) {
            echo "<li class='produk-item'>";
            echo "<strong>Nama:</strong> " . htmlspecialchars($item[0]) . "<br>";
            echo "<strong>Harga:</strong> Rp" . number_format($item[1]) . "<br>";
            echo "<strong>Kategori:</strong> " . htmlspecialchars($item[2]);
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>

</div>

</body>
</html>