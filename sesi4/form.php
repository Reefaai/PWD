<?php
// Proses form jika ada data yang dikirim
if ($_POST) {
    echo "<div style='background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px;'>";
    echo "<h3>Data yang diterima:</h3>";
    echo "<p><strong>Nama:</strong> " . htmlspecialchars($_POST['nama']) . "</p>";
    echo "<p><strong>Tempat/Tanggal Lahir:</strong> " . htmlspecialchars($_POST['tempat_lahir']) . " / " . htmlspecialchars($_POST['tanggal_lahir']) . "</p>";
    echo "<p><strong>Agama:</strong> " . htmlspecialchars($_POST['agama']) . "</p>";
    echo "<p><strong>Alamat:</strong> " . htmlspecialchars($_POST['alamat']) . "</p>";
    echo "<p><strong>No Telp/HP:</strong> " . htmlspecialchars($_POST['no_telp']) . "</p>";
    echo "<p><strong>Jenis Kelamin:</strong> " . htmlspecialchars($_POST['jenis_kelamin']) . "</p>";
    
    $hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : 'Tidak ada';
    echo "<p><strong>Hobi:</strong> " . htmlspecialchars($hobi) . "</p>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
            color: #333;
            vertical-align: top;
            margin-bottom: 5px;
        }
        
        input[type="text"], 
        input[type="date"], 
        select, 
        textarea {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        
        textarea {
            width: 300px;
            height: 80px;
            resize: vertical;
        }
        
        .radio-group {
            display: inline-block;
        }
        
        .radio-group input[type="radio"] {
            margin-right: 5px;
            width: auto;
        }
        
        .radio-group label {
            width: auto;
            margin-right: 15px;
            font-weight: normal;
        }
        
        .checkbox-group {
            display: inline-block;
            vertical-align: top;
        }
        
        .checkbox-group input[type="checkbox"] {
            margin-right: 5px;
            width: auto;
        }
        
        .checkbox-group label {
            width: auto;
            margin-right: 15px;
            font-weight: normal;
            display: inline-block;
            margin-bottom: 5px;
        }
        
        .checkbox-container {
            display: inline-block;
            width: 100px;
            vertical-align: top;
        }
        
        .file-input {
            margin-top: 5px;
        }
        
        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        
        .submit-btn:hover {
            background-color: #0056b3;
        }
        
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .form-row label {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulir Pendaftaran Siswa</h2>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <label for="nama">Nama Calon Siswa:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-row">
                <label for="tempat_lahir">Tempat/Tanggal Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir" style="width: 120px;" required>
                <span style="margin: 0 10px;">/</span>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" style="width: 140px;" required>
            </div>
            
            <div class="form-row">
                <label for="agama">Agama:</label>
                <select id="agama" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            
            <div class="form-row">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>
            
            <div class="form-row">
                <label for="no_telp">No Telp/HP:</label>
                <input type="text" id="no_telp" name="no_telp" placeholder="08xxxxxxxx" required>
            </div>
            
            <div class="form-row">
                <label>Jenis Kelamin:</label>
                <div class="radio-group">
                    <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
                    <label for="pria">Pria</label>
                    
                    <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
                    <label for="wanita">Wanita</label>
                </div>
            </div>
            
            <div class="form-row">
                <label>Hobi:</label>
                <div class="checkbox-group">
                    <div class="checkbox-container">
                        <input type="checkbox" id="membaca" name="hobi[]" value="Membaca">
                        <label for="membaca">Membaca</label>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" id="menulis" name="hobi[]" value="Menulis">
                        <label for="menulis">Menulis</label>
                    </div>
                    <div class="checkbox-container">
                        <input type="checkbox" id="olahraga" name="hobi[]" value="Olahraga">
                        <label for="olahraga">Olahraga</label>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <label for="pas_foto">Pas Foto:</label>
                <div>
                    <input type="file" id="pas_foto" name="pas_foto" accept="image/*" class="file-input">
                    <br><small>Format: JPG, PNG, maksimal 2MB</small>
                </div>
            </div>
            
            <div style="text-align: left; margin-top: 30px;">
                <button type="submit" class="submit-btn">SUBMIT</button>
            </div>
        </form>
    </div>
</body>
</html>