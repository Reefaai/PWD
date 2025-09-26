<?php 
$nama = $_POST['nama'];
$tugas = $_POST['tugas'];
$quiz = $_POST['quiz'];
$uts = $_POST['uts'];
$uas = $_POST['uas'];
$nilai_akhir = ($tugas * 0.2) + ($quiz * 0.1) + ($uts * 0.3) + ($uas * 0.4);

if ($nilai_akhir >= 80) {
    $index = "A";
    $keterangan = "Sangat Baik";
} elseif ($nilai_akhir >= 70) {
    $index = "B";
    $keterangan = "Baik";
} elseif ($nilai_akhir >= 60) {
    $index = "C";
    $keterangan = "Cukup";
} elseif ($nilai_akhir >= 50) {
    $index = "D";
    $keterangan = "Kurang";
} elseif ($nilai_akhir < 50) {
    $index = "E";
    $keterangan = "Sangat Kurang";
}


echo "<center>
    <table>
        <tr>
            <td>Nama:</td>   
            <td>$nama</td>
        </tr>
        <tr>
            <td>Nilai Tugas:</td>
            <td>$tugas</td>
        </tr>
        <tr>
            <td>Nilai Quiz:</td>
            <td>$quiz</td>
        </tr>
        <tr>
            <td>Nilai UTS:</td>
            <td>$uts</td>
        </tr>
        <tr>
            <td>Nilai UAS:</td>
            <td>$uas</td>
        </tr>
        <tr>
            <td>Nilai Akhir:</td>
            <td>$nilai_akhir</td>
        </tr>
        <tr>
            <td>Index:</td>
            <td>$index</td>
        </tr>
        <tr>
            <td>Keterangan:</td>
            <td>$keterangan</td>
        </tr>
    </table>
</center>"


?>

