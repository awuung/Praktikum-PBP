<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        body {
            background-color: #e9f7f6;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 60px auto;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            transition: box-shadow 0.3s ease;
        }

        .container:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .title {
            text-align: center;
            background-color: #00796b;
            color: white;
            padding: 20px;
            border-radius: 12px 12px 0 0;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            table {
                font-size: 16px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <?php
    function hitung_rata($array) {
        $jumlah = array_sum($array);
        $banyak = count($array);
        $rata = $jumlah / $banyak;
        return $rata;
    }

    function print_mhs($array_mhs) {
        echo "<div class ='container'>";
            echo "<div class='title'>";
                echo "<h1>Daftar Nilai Mahasiswa</h1>";
            echo "</div>";
            echo "<table>";
            echo "<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata-rata</th></tr>";

            foreach ($array_mhs as $nama => $nilai) {
                $rata2 = hitung_rata($nilai);
                echo "<tr>";
                echo "<td>$nama</td>";
                echo "<td>$nilai[0]</td>";
                echo "<td>$nilai[1]</td>";
                echo "<td>$nilai[2]</td>";
                echo "<td>" . $rata2 . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        echo "</div>";
    }

    $array_mhs = array(
    'Abdul' => array(89,90,54),
    'Budi' => array(78,60,64),
    'Nina' => array(67,56,84),
    'Budi' => array(87,69,50),
    'Budi' => array(98,65,74));

    print_mhs($array_mhs);
    ?>
</body>
</html>
