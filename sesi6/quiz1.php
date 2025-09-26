<?php
/*
 * NIM           : 42240169
 * Nama          : Ahmad rifa`i
 * Prodi         : Rekayasa Perangkat Lunak
 * Tugas         : Quiz soal 3 - Program Input Nilai Mahasiswa Berulang
 * Nama Kelompok : PEWTERSCHMIDT
 */

// Cek apakah ada parameter selesai di URL ($_GET['selesai'])
if (isset($_GET['selesai']) && $_GET['selesai'] == '1') {
    // Jika ada, tampilkan pesan "Terima kasih!" dan jangan tampilkan form input
    echo "<h2>Terima kasih telah menggunakan program ini!</h2>";
    exit(); // Hentikan eksekusi script
}

// Variabel untuk menyimpan hasil
$tampilkan_hasil = false;
$nama = "";
$nilai = 0;
$predikat = "";

// Cek apakah form sudah disubmit dengan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data dari form menggunakan $_POST
    $nama = $_POST['nama_mahasiswa'];
    $nilai = $_POST['nilai'];
    
    // Gunakan pencabangan (if-elseif-else) untuk menentukan Predikat
    if ($nilai >= 85) {
        $predikat = "A";
    } elseif ($nilai >= 70) {
        $predikat = "B";  
    } elseif ($nilai >= 60) {
        $predikat = "C";
    } else {
        $predikat = "D";
    }
    
    // Set flag untuk menampilkan hasil
    $tampilkan_hasil = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai Mahasiswa</title>
    <style>
        /* CSS minimal untuk tampilan dasar */
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            display: flex;
            justify-content: center;
        }
        .container {
            border: 1px solid #000;
            padding: 20px;
            max-width: 400px;
        }
        input {
            margin: 5px 0;
            padding: 5px;
        }
        .hasil {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #333;
        }

        .title {
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>

<?php if (!$tampilkan_hasil): ?>
    <!-- Form Input (HTML) -->
    <div class="container">
        <hr>
        <div class="title">
            <h3 class="title">INPUT NILAI MAHASISWA</h3>
        </div>
        <hr>
        
        <form method="POST" action="quiz1.php">
            <table>
                <tr>
                    <!-- Input teks untuk Nama Mahasiswa -->
                    <td>Nama Mahasiswa:</td>
                    <td><input type="text" name="nama_mahasiswa" required></td>
                </tr>
                <tr>
                    <!-- Input number untuk Nilai (0-100) -->
                    <td>Nilai (0-100):</td>
                    <td><input type="number" name="nilai" min="0" max="100" required></td>
                </tr>
                <tr>
                    <!-- Tombol submit bertuliskan "Proses Nilai" -->
                    <td><input type="submit" value="Proses Nilai"></td>
                </tr>
            </table>
            
            
            
        </form>
        <hr>
    </div>

<?php else: ?>
    <!-- Tampilkan hasil dalam format tabel atau daftar -->
    <div class="container">
        <div class="hasil">
            <strong>--- Hasil Nilai Mahasiswa ---</strong><br><br>
            Nama: <?php echo $nama; ?><br>
            Nilai: <?php echo $nilai; ?><br>
            Predikat: <?php echo $predikat; ?><br><br>
            
            <!-- Buat dua buah link -->
            Input data lagi? 
            <!-- Link pertama: mengarahkan kembali ke halaman form kosong -->
            <a href="quiz1.php">[YA]</a> / 
            <!-- Link kedua: mengarahkan ke halaman yang sama dengan parameter selesai=1 -->
            <a href="?selesai=1">[TIDAK]</a>
        </div>
    </div>

<?php endif; ?>

</body>
</html>