<!DOCTYPE html>
<html>
<head>
    <title>Operasi Matriks 2x2</title>
     <style>
        table { border-collapse: collapse; margin: 15px 0; }
        td { border: 1px solid black; padding: 10px; text-align: center; }
        .operator { font-size: 24px; padding: 0 15px; }
    </style>
</head>
<body>
    <h1>Tugas NIM Ganjil: Operasi Matriks 2x2</h1>
    
    <?php
    // Definisikan dua matriks 2x2
    $matriksA = [ [3, 1], [2, 4] ];
    $matriksB = [ [5, 2], [1, 3] ];

    // Fungsi untuk menampilkan matriks
    function tampilkanMatriks($mat) {
        echo "<table>";
        for ($i = 0; $i < 2; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 2; $j++) {
                echo "<td>" . $mat[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    // Perkalian Matriks
    $hasilKali = [ [0, 0], [0, 0] ];
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 2; $j++) {
            for ($k = 0; $k < 2; $k++) {
                $hasilKali[$i][$j] += $matriksA[$i][$k] * $matriksB[$k][$j];
            }
        }
    }

    // Determinan Matriks
    $detA = ($matriksA[0][0] * $matriksA[1][1]) - ($matriksA[0][1] * $matriksA[1][0]);
    $detB = ($matriksB[0][0] * $matriksB[1][1]) - ($matriksB[0][1] * $matriksB[1][0]);
    ?>

    <h3>Perkalian Matriks</h3>
    <div style="display: flex; align-items: center;">
        <?php tampilkanMatriks($matriksA); ?>
        <span class="operator">x</span>
        <?php tampilkanMatriks($matriksB); ?>
        <span class="operator">=</span>
        <?php tampilkanMatriks($hasilKali); ?>
    </div>
    
    <hr>

    <h3>Determinan Matriks</h3>
    <div style="display: flex; align-items: center;">
        <div>
            <p>Matriks A</p>
            <?php tampilkanMatriks($matriksA); ?>
            <p>Determinan A = <?php echo $detA; ?></p>
        </div>
        <div style="margin-left: 50px;">
            <p>Matriks B</p>
            <?php tampilkanMatriks($matriksB); ?>
            <p>Determinan B = <?php echo $detB; ?></p>
        </div>
    </div>
</body>
</html>