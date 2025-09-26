<?php
$nama = $_POST['nama'];
$algoritma = $_POST['algo'];
$database = $_POST['dbs'];
$inggris = $_POST['inggris'];
$java = $_POST['jv'];
$total = $algoritma + $database + $inggris + $java;
$rata = $total / 4;
if ($rata >= 85) {
    $grade = 'A Kompeten';
}
elseif ($rata >= 75) {
    $grade = 'B Kompeten';
}
elseif ($rata >= 65) {
    $grade = 'C Kompeten';
}
elseif ($rata >= 55) {
    $grade = 'D Tidak kompeten';
}
else{
    $grade = 'E Tidak kompeten';
}
echo " <center> 
    <table>
        <tr>
            <td>Nama</td>
            <td>$nama</td>
        </tr>
        <tr>
            <td>Nilai</td>
        </tr>
        <tr>
            <td>Algoritma</td>
            <td>$algoritma</td>
        </tr>
        <tr>
            <td>Database</td>
            <td>$database</td>
        </tr>
        <tr>
            <td>B.Inggris</td>
            <td>$inggris</td>
        </tr>
        <tr>
            <td>Pemrograman Java</td>
            <td>$java</td>
        </tr>
        <tr>
            <td>Total Nilai</td>
            <td>$total</td>
        </tr>
        <tr>
            <td>Rata Rata nilai</td>
            <td>$rata</td>
        </tr>
        <tr>
            <td>Grade</td>
            <td>$grade</td>
        </tr>
    </table>
</center>";
?>