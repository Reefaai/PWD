<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Soal 2: Hitung Rata-Rata Nilai</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .container { max-width: 600px; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 8px; }
        .input-group { margin-bottom: 10px; }
        label { display: block; margin-bottom: 5px; }
        input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        .result { margin-top: 20px; padding: 15px; background-color: #e9f7ef; border-left: 5px solid #28a745; }
    </style>
</head>
<body>

<div class="container">
    <h2>Menghitung Rata-Rata Nilai Ujian 5 Siswa</h2>
    <p>Silakan masukkan nilai untuk 5 siswa di bawah ini.</p>

    <?php
    // Bagian ini adalah untuk memproses data SETELAH form di-submit
    // Mengecek apakah request yang masuk adalah POST (artinya, form telah dikirim)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Mengambil data nilai dari form yang dikirim sebagai array
        $nilai_ujian = $_POST['nilai'];
        $jumlah_siswa = count($nilai_ujian);
        $total_nilai = 0;

        // **Catatan tentang `do-while` untuk input:**
        // Dalam aplikasi web, perulangan seperti `do-while` untuk meminta input berulang kali
        // lebih cocok untuk aplikasi command-line (CLI). Untuk web, formulir HTML ini
        // adalah cara untuk "meminta input". Logika `do-while` untuk input tidak diterapkan
        // secara langsung di sini karena sifat request-response dari HTTP.

        // Menggunakan looping FOR untuk menghitung total nilai (sesuai instruksi soal)
        for ($i = 0; $i < $jumlah_siswa; $i++) {
            // Menambahkan setiap nilai ke variabel total_nilai
            $total_nilai += (int)$nilai_ujian[$i];
        }

        // Menghitung rata-rata
        $rata_rata = $total_nilai / $jumlah_siswa;

        // Menampilkan hasil perhitungan
        echo "<div class='result'>";
        echo "<h4>Hasil Perhitungan:</h4>";
        echo "Nilai yang diinput: " . implode(", ", $nilai_ujian) . "<br>";
        echo "Total Nilai Semua Siswa: " . $total_nilai . "<br>";
        echo "Jumlah Siswa: " . $jumlah_siswa . "<br>";
        echo "<b>Rata-rata Nilai Ujian: " . number_format($rata_rata, 2) . "</b>";
        echo "</div>";
    }
    ?>

    <form action="" method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="input-group">
                <label for="nilai<?php echo $i; ?>">Nilai Siswa ke-<?php echo $i; ?>:</label>
                <input type="number" id="nilai<?php echo $i; ?>" name="nilai[]" required min="0" max="100">
            </div>
        <?php endfor; ?>
        <button type="submit">Hitung Rata-Rata</button>
    </form>
</div>

</body>
</html>