<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Soal 1: Olah Data Nilai Ujian</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 600px; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .avg-col { background-color: #e6f7ff; font-weight: bold; }
        .avg-row td { background-color: #fffbe6; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Analisis Nilai Ujian Siswa</h2>

    <?php
    // Data nilai ujian siswa
    $nilaiUjian = [
        ["Matematika", 70, 85, 90, 65],
        ["Fisika", 80, 92, 78, 60],
        ["Kimia", 85, 77, 95, 72],
    ];

    $jumlahMapel = count($nilaiUjian);
    $jumlahSiswa = count($nilaiUjian[0]) - 1;

    $rataRataMapel = [];
    foreach ($nilaiUjian as $mapelData) {
        $totalNilaiMapel = 0;
        for ($i = 1; $i <= $jumlahSiswa; $i++) {
            $totalNilaiMapel += $mapelData[$i];
        }
        $rataRataMapel[] = $totalNilaiMapel / $jumlahSiswa;
    }

    $rataRataSiswa = [];
    for ($i = 1; $i <= $jumlahSiswa; $i++) {
        $totalNilaiSiswa = 0;
        foreach ($nilaiUjian as $mapelData) {
            $totalNilaiSiswa += $mapelData[$i];
        }
        $rataRataSiswa[] = $totalNilaiSiswa / $jumlahMapel;
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <?php for ($i = 1; $i <= $jumlahSiswa; $i++) { echo "<th>Siswa $i</th>"; } ?>
                <th class="avg-col">Rata-rata Mapel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilaiUjian as $index => $mapelData): ?>
            <tr>
                <td><?php echo $mapelData[0]; ?></td>
                <?php for ($i = 1; $i <= $jumlahSiswa; $i++): ?>
                    <td><?php echo $mapelData[$i]; ?></td>
                <?php endfor; ?>
                <td class="avg-col"><?php echo number_format($rataRataMapel[$index], 2); ?></td>
            </tr>
            <?php endforeach; ?>
            
            <tr class="avg-row">
                <td><strong>Rata-rata Siswa</strong></td>
                <?php foreach ($rataRataSiswa as $rerata): ?>
                    <td><?php echo number_format($rerata, 2); ?></td>
                <?php endforeach; ?>
                <td class="avg-col"></td>
            </tr>
        </tbody>
    </table>

</body>
</html>