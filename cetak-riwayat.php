<?php 
include_once 'koneksi-db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Diagnosa Penyakit Skizofrenia</title>
</head>
<body>

    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .tengah{
            text-align: center;
        }
    </style>

    <center>
        <h2>Data Riwayat Diagnosa</h2>
        <h3>SKIZO-CHECK</h3>
    </center>

    <hr>

    <table>
        <tr>
            <th>Nama</th>
            <th>Gender</th>
            <th>Usia</th>
            <th>Tgl Diagnosa</th>
            <th>Keterangan</th>
            <th>Solusi</th>
        </tr>
        <?php 
        // koneksi database  
        $ssql = "SELECT * FROM daftar_user WHERE id_pasien ='".$_SESSION['user']."'";
        $query = mysqli_query($koneksi, $ssql);
        while ($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['jenis_kelamin'] ?></td>
            <td><?php echo $data['usia'] ?></td>
            <td><?php echo $data['tgl_diagnosa'] ?></td>
            <td><?php echo $data['keterangan'] ?></td>
            <td><?php echo $data['solusi'] ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
    <h5>Catatan : </h5>
    <p>
        data tersebut berdasarkan hasil diagnosa sistem pakar
        berdasarkan gejala yang dikeluhkan oleh pasien
        dan sistem melakukan proses diagnosa dengan metode naive bayes,
        data basis pengetahuan berdasarkan dari pakar Dr. Diding Sawaludin, Sp.Kj, M.Kes
        sebagai Dokter Jiwa Di Rumah Sakit Islam Karawang.
    </p>

    <script>
    window.print();
    </script>
</body>
</html>
