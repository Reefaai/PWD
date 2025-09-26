<?php
/*
 * =========================================
 * NIM     : 42240169
 * Nama    : Ahmad rifa`i
 * Prodi   : Rekayasa Perangkat Lunak   
 * Tugas   : Quiz Soal 3 - Program Input Nilai Mahasiswa Berulang
 * =========================================
 */

// Cek apakah parameter 'selesai' ada di URL (untuk mengakhiri program)
if (isset($_GET['selesai']) && $_GET['selesai'] == '1') {
    // Jika parameter selesai ada, tampilkan pesan terima kasih
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Program Selesai</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
            }
            .container {
                background-color: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                text-align: center;
            }
            h2 {
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Terima kasih telah menggunakan program ini!</h2>
            <p>Program Input Nilai Mahasiswa telah selesai.</p>
            <br>
            <a href="nilai_mahasiswa.php" style="color: #007bff; text-decoration: none;">← Kembali ke Program</a>
        </div>
    </body>
    </html>
    <?php
    exit(); // Hentikan eksekusi script selanjutnya
}

// Inisialisasi variabel untuk menyimpan data hasil proses
$hasil_proses = false;
$nama_mahasiswa = "";
$nilai = 0;
$predikat = "";

// Cek apakah form sudah disubmit dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Tangkap dan sanitasi data dari form
    $nama_mahasiswa = htmlspecialchars(trim($_POST['nama_mahasiswa']), ENT_QUOTES, 'UTF-8');
    $nilai = floatval($_POST['nilai']);
    
    // Validasi input
    if (!empty($nama_mahasiswa) && $nilai >= 0 && $nilai <= 100) {
        // Tentukan predikat berdasarkan nilai menggunakan if-elseif-else
        if ($nilai >= 85) {
            $predikat = "A";
        } elseif ($nilai >= 70) {
            $predikat = "B";
        } elseif ($nilai >= 60) {
            $predikat = "C";
        } else {
            $predikat = "D";
        }
        
        // Set flag bahwa data sudah diproses
        $hasil_proses = true;
    } else {
        // Jika validasi gagal, set pesan error
        $error_message = "Data tidak valid! Pastikan nama tidak kosong dan nilai antara 0-100.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Input Nilai Mahasiswa</title>
    <style>
        /* CSS untuk styling halaman */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
        }
        
        .header {
            background: #4c51bf;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        
        .divider {
            border-bottom: 2px solid #e2e8f0;
            margin: 0 20px;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #4c51bf;
        }
        
        .btn-submit {
            width: 100%;
            padding: 12px 20px;
            background: #4c51bf;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .btn-submit:hover {
            background: #434190;
        }
        
        .hasil {
            background: #f7fafc;
            padding: 25px;
            margin: 20px;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
        }
        
        .hasil h2 {
            color: #2d3748;
            margin-bottom: 20px;
            text-align: center;
            font-size: 20px;
        }
        
        .hasil-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .hasil-item:last-child {
            border-bottom: none;
        }
        
        .hasil-label {
            font-weight: 600;
            color: #4a5568;
        }
        
        .hasil-value {
            color: #2d3748;
        }
        
        .predikat {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
        }
        
        .predikat-A {
            background: #48bb78;
            color: white;
        }
        
        .predikat-B {
            background: #4299e1;
            color: white;
        }
        
        .predikat-C {
            background: #ed8936;
            color: white;
        }
        
        .predikat-D {
            background: #f56565;
            color: white;
        }
        
        .action-links {
            text-align: center;
            padding: 20px;
            background: #f7fafc;
        }
        
        .action-links p {
            margin-bottom: 15px;
            color: #4a5568;
            font-weight: 500;
        }
        
        .btn-link {
            display: inline-block;
            padding: 10px 25px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-ya {
            background: #48bb78;
            color: white;
        }
        
        .btn-ya:hover {
            background: #38a169;
            transform: translateY(-2px);
        }
        
        .btn-tidak {
            background: #f56565;
            color: white;
        }
        
        .btn-tidak:hover {
            background: #e53e3e;
            transform: translateY(-2px);
        }
        
        .error {
            background: #fed7d7;
            color: #c53030;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #fc8181;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>INPUT NILAI MAHASISWA</h1>
            <p style="margin-top: 5px; opacity: 0.9;">Program Penilaian Akademik</p>
        </div>
        
        <?php if (!$hasil_proses): ?>
            <!-- Tampilkan form input jika belum ada hasil atau ingin input lagi -->
            <div class="form-container">
                <?php if (isset($error_message)): ?>
                    <div class="error">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="nilai_mahasiswa.php">
                    <div class="form-group">
                        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
                        <input type="text" 
                               id="nama_mahasiswa" 
                               name="nama_mahasiswa" 
                               placeholder="Masukkan nama lengkap mahasiswa"
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nilai">Nilai (0-100):</label>
                        <input type="number" 
                               id="nilai" 
                               name="nilai" 
                               min="0" 
                               max="100" 
                               step="0.01"
                               placeholder="Masukkan nilai (0-100)"
                               required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn-submit">
                        Proses Nilai
                    </button>
                </form>
            </div>
            
        <?php else: ?>
            <!-- Tampilkan hasil proses jika data sudah disubmit -->
            <div class="hasil">
                <h2>--- Hasil Nilai Mahasiswa ---</h2>
                
                <div class="hasil-item">
                    <span class="hasil-label">Nama:</span>
                    <span class="hasil-value"><?php echo $nama_mahasiswa; ?></span>
                </div>
                
                <div class="hasil-item">
                    <span class="hasil-label">Nilai:</span>
                    <span class="hasil-value"><?php echo number_format($nilai, 2); ?></span>
                </div>
                
                <div class="hasil-item">
                    <span class="hasil-label">Predikat:</span>
                    <span class="hasil-value">
                        <span class="predikat predikat-<?php echo $predikat; ?>">
                            <?php echo $predikat; ?>
                        </span>
                    </span>
                </div>
            </div>
            
            <!-- Tampilkan pilihan untuk input lagi atau selesai -->
            <div class="action-links">
                <p>Input data lagi?</p>
                <a href="nilai_mahasiswa.php" class="btn-link btn-ya">[YA]</a>
                <a href="?selesai=1" class="btn-link btn-tidak">[TIDAK]</a>
            </div>
            
        <?php endif; ?>
    </div>
</body>
</html>