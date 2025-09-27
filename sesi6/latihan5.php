<!DOCTYPE html>
<html>
<head>
    <title>Latihan 5: Array 2 Dimensi</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Usia</th>
        </tr>
        <?php
        $mahasiswa = array(
            array("Fitri", "Teknik Informatika", "Perempuan", 20),
            array("Nizam", "Sistem Komputer", "Laki-laki", 20),
            array("Vina", "Bahasa Inggris", "Perempuan", 24),
            array("Ma'ruf", "Agribisnis", "Laki-laki", 20),
            array("Nia", "Manajemen", "Perempuan", 24)
        );

        // Perulangan untuk baris
        for ($row = 0; $row < count($mahasiswa); $row++) {
            echo "<tr>";
            // Perulangan untuk kolom
            for ($col = 0; $col < count($mahasiswa[$row]); $col++) {
                echo "<td>" . $mahasiswa[$row][$col] . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>