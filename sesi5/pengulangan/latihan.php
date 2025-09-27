<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Pengulangan PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .latihan { border: 1px solid #ccc; padding: 15px; margin: 15px 0; border-radius: 5px; }
        .latihan h3 { color: #2c3e50; margin-top: 0; }
        table { border-collapse: collapse; margin: 10px 0; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 8px; text-align: left; }
        .code-output { background: #f8f9fa; padding: 10px; border-left: 4px solid #007bff; }
        form { background: #f1f3f4; padding: 15px; border-radius: 5px; margin: 10px 0; }
        input, button { padding: 8px; margin: 5px 0; }
        button { background: #007bff; color: white; border: none; cursor: pointer; border-radius: 3px; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Latihan Pengulangan PHP</h1>
    
    <!-- LATIHAN FOR -->
    <div class="latihan">
        <h3>1. Perulangan FOR</h3>
        <div class="code-output">
            <?php
            echo "<h4>Contoh 1: Angka 1-10</h4>";
            for($i=1; $i<=10; $i++){
                echo "Akan menampilkan perulangan for ke $i<br>";
            }
            
            echo "<h4>Contoh 2: Tabel Perkalian</h4>";
            echo "<table>";
            echo "<tr><th>No</th><th>2 x No</th><th>Hasil</th></tr>";
            for($i=1; $i<=5; $i++){
                $hasil = 2 * $i;
                echo "<tr><td>$i</td><td>2 x $i</td><td>$hasil</td></tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>

    <!-- LATIHAN WHILE -->
    <div class="latihan">
        <h3>2. Perulangan WHILE</h3>
        <div class="code-output">
            <?php
            echo "<h4>Contoh 1: Countdown</h4>";
            $i = 10;
            while($i >= 1){
                echo "Countdown: $i<br>";
                $i--;
            }
            
            echo "<h4>Contoh 2: Bilangan Genap</h4>";
            $num = 2;
            while($num <= 10){
                echo "Bilangan genap: $num<br>";
                $num += 2;
            }
            ?>
        </div>
    </div>

    <!-- LATIHAN DO-WHILE -->
    <div class="latihan">
        <h3>3. Perulangan DO-WHILE</h3>
        <div class="code-output">
            <?php
            echo "<h4>Contoh 1: Minimal satu kali eksekusi</h4>";
            $i = 1;
            do{
                echo "Belajar perulangan do-while ke $i<br>";
                $i++;
            }while($i <= 5);
            
            echo "<h4>Contoh 2: Input validation simulation</h4>";
            $attempt = 1;
            do{
                echo "Percobaan login ke-$attempt<br>";
                $attempt++;
            }while($attempt <= 3);
            ?>
        </div>
    </div>

    <!-- LATIHAN FOREACH -->
    <div class="latihan">
        <h3>4. Perulangan FOREACH</h3>
        <div class="code-output">
            <?php
            echo "<h4>Contoh 1: Array Buku</h4>";
            $books = [
                "Panduan Belajar PHP untuk Pemula",
                "Membangun Aplikasi Web dengan PHP",
                "Tutorial PHP dan MySQL",
                "Membuat Chat Bot dengan PHP"
            ];
            echo "<h5>Judul Buku PHP:</h5>";
            echo "<ul>";
            foreach($books as $buku){
                echo "<li>$buku</li>";
            }
            echo "</ul>";
            
            echo "<h4>Contoh 2: Array Associative</h4>";
            $mahasiswa = [
                "nama" => "Ahmad Budi",
                "nim" => "12345678",
                "jurusan" => "Teknik Informatika",
                "angkatan" => "2023"
            ];
            echo "<table>";
            foreach($mahasiswa as $key => $value){
                echo "<tr><td><strong>".ucfirst($key)."</strong></td><td>$value</td></tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>

    <!-- LATIHAN MENGHITUNG KARAKTER -->
    <div class="latihan">
        <h3>5. Menghitung Karakter (Latihan-1)</h3>
        <div class="code-output">
            <?php
            $kalimat = "1. Belajar PHP dari Dasar - Pengertian PHP";
            echo "<p>Kalimat: <u>$kalimat</u></p>";
            
            $jumlah_karakter = strlen($kalimat);
            echo "<p>Jumlah karakter = <strong>$jumlah_karakter</strong> karakter</p>";
            
            // Mencari huruf tertentu
            echo "<h4>Analisis Huruf:</h4>";
            echo "Jumlah huruf 'a': " . substr_count(strtolower($kalimat), 'a') . " buah<br>";
            echo "Jumlah huruf 'P': " . substr_count($kalimat, 'P') . " buah<br>";
            echo "Jumlah spasi: " . substr_count($kalimat, ' ') . " buah<br>";
            ?>
        </div>
    </div>

    <!-- LATIHAN HITUNG HURUF VOKAL (Latihan-2) -->
    <div class="latihan">
        <h3>6. Hitung Huruf Vokal (Latihan-2)</h3>
        
        <?php
        function hitung_vocal($kata){
            $arr = str_split(strtolower($kata));
            $vocal = ['a', 'i', 'u', 'e', 'o'];
            $found = array_intersect($vocal, $arr);
            $count = array_count_values($arr);
            $result = [];
            foreach ($found as $item) {
                $result[$item] = $count[$item];
            }
            return $result;
        }
        
        function hitung_total_vocal($kata){
            $vocal_count = hitung_vocal($kata);
            return array_sum($vocal_count);
        }
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>
                <label for="kata">Masukkan Kata/Kalimat:</label><br>
                <input type="text" name="kata" id="kata" placeholder="Contoh: programming" value="<?php echo isset($_POST['kata']) ? htmlspecialchars($_POST['kata']) : ''; ?>" required>
            </p>
            <p>
                <button type="submit">Hitung Vokal</button>
            </p>
        </form>

        <?php if ($_POST && isset($_POST['kata']) && !empty($_POST['kata'])): ?>
            <hr>
            <h4>Hasil Analisis: "<?php echo htmlspecialchars($_POST['kata']); ?>"</h4>
            
            <table>
                <tr><th>Huruf Vokal</th><th>Jumlah</th></tr>
                <?php 
                $hasil_vokal = hitung_vocal($_POST['kata']);
                if(empty($hasil_vokal)): ?>
                    <tr><td colspan="2">Tidak ada huruf vokal ditemukan</td></tr>
                <?php else:
                    foreach ($hasil_vokal as $huruf => $jumlah): ?>
                    <tr>
                        <td style="width:100px; text-align:center; font-weight:bold;"><?php echo strtoupper($huruf) ?></td>
                        <td style="width:100px; text-align:center;"><?php echo $jumlah ?></td>
                    </tr>
                <?php endforeach; endif; ?>
                <tr style="background-color: #e9ecef;">
                    <td><strong>Total Vokal</strong></td>
                    <td><strong><?php echo hitung_total_vocal($_POST['kata']); ?></strong></td>
                </tr>
            </table>
            
            <h4>Informasi Tambahan:</h4>
            <ul>
                <li>Total karakter: <?php echo strlen($_POST['kata']); ?></li>
                <li>Total vokal: <?php echo hitung_total_vocal($_POST['kata']); ?></li>
                <li>Total konsonan: <?php echo strlen(preg_replace('/[aeiouAEIOU\s\d\W]/', '', $_POST['kata'])); ?></li>
            </ul>
        <?php endif; ?>
    </div>

    <!-- LATIHAN TAMBAHAN -->
    <div class="latihan">
        <h3>7. Latihan Tambahan: Kombinasi Perulangan</h3>
        <div class="code-output">
            <?php
            echo "<h4>Pola Segitiga Bintang</h4>";
            for($i = 1; $i <= 5; $i++){
                for($j = 1; $j <= $i; $j++){
                    echo "*";
                }
                echo "<br>";
            }
            
            echo "<h4>Tabel Perkalian 5x5</h4>";
            echo "<table>";
            echo "<tr><th>x</th>";
            for($i = 1; $i <= 5; $i++){
                echo "<th>$i</th>";
            }
            echo "</tr>";
            
            for($i = 1; $i <= 5; $i++){
                echo "<tr><th>$i</th>";
                for($j = 1; $j <= 5; $j++){
                    $hasil = $i * $j;
                    echo "<td>$hasil</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            
            echo "<h4>Fibonacci 10 angka pertama</h4>";
            $a = 0; $b = 1;
            echo "Deret Fibonacci: $a, $b";
            for($i = 2; $i < 10; $i++){
                $c = $a + $b;
                echo ", $c";
                $a = $b;
                $b = $c;
            }
            ?>
        </div>
    </div>

    <!-- LATIHAN NESTED LOOP -->
    <div class="latihan">
        <h3>8. Nested Loop - Pola Angka</h3>
        <div class="code-output">
            <?php
            echo "<h4>Pola Angka Berurutan:</h4>";
            for($i = 1; $i <= 4; $i++){
                for($j = 1; $j <= $i; $j++){
                    echo $j . " ";
                }
                echo "<br>";
            }
            
            echo "<h4>Pola Angka Terbalik:</h4>";
            for($i = 4; $i >= 1; $i--){
                for($j = 1; $j <= $i; $j++){
                    echo $j . " ";
                }
                echo "<br>";
            }
            ?>
        </div>
    </div>

</body>
</html>