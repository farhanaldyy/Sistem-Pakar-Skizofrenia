<?php 
    include_once 'koneksi-db.php';
?>

<?php 

    /* cek nilai session n_atas 1,2...6 diisi atau belum */
    if (!isset($_SESSION['n_atas1'])){
        $_SESSION['n_atas1'] = 1;
    }

    if (!isset($_SESSION['n_atas2'])){
        $_SESSION['n_atas2'] = 1;
    }

    if (!isset($_SESSION['n_atas3'])){
        $_SESSION['n_atas3'] = 1;
    }

    if (!isset($_SESSION['n_atas4'])){
        $_SESSION['n_atas4'] = 1;
    }

    if (!isset($_SESSION['n_atas5'])){
        $_SESSION['n_atas5'] = 1;
    }

    if (!isset($_SESSION['n_atas6'])){
        $_SESSION['n_atas6'] = 1;
    }

    if (!isset($_SESSION['jumlah_keluhan'])){
        $_SESSION['jumlah_keluhan'] = 0;
    }
    else {
        $_SESSION['jumlah_keluhan'] = $_SESSION['jumlah_keluhan'];
    }   

    /* proses record jawaban yang dilakukan user */
    if (isset($_GET['jawaban'])){
        $jawaban = $_GET['jawaban'];
        $rute = $_GET['rute'];

        switch($jawaban){
            case 'benar':
                $ssql = "SELECT * FROM basis_aturan WHERE id_gejala='$rute'";
                $query = mysqli_query($koneksi, $ssql);

                while ($record = mysqli_fetch_array($query)){
                    /* record data untuk rute selanjutnya */
                    $rute = $record['rute'];
                    $fakta_ya = $record['fakta_ya'];
                    $ngejala_paranoid = $record['ngejala_paranoid'];
                    $ngejala_hiberfrenik = $record['ngejala_hiberfrenik'];
                    $ngejala_katonik = $record['ngejala_katonik'];
                    $ngejala_residual = $record['ngejala_residual'];
                    $ngejala_simpleks = $record['ngejala_simpleks'];
                    $ngejala_takterinci = $record['ngejala_takterinci'];

                    /* masukan nilai sementara bagian atas rumus bayes */
                    $_SESSION['keluhan'] [$_SESSION['jumlah_keluhan']] = $fakta_ya;
                    $_SESSION['jumlah_keluhan'] += 1;
                    $_SESSION['n_atas1'] += $ngejala_paranoid;
                    $_SESSION['n_atas2'] += $ngejala_hiberfrenik;
                    $_SESSION['n_atas3'] += $ngejala_katonik;
                    $_SESSION['n_atas4'] += $ngejala_residual;
                    $_SESSION['n_atas5'] += $ngejala_simpleks;
                    $_SESSION['n_atas6'] += $ngejala_takterinci;

                    if (strcmp($rute, 'final')==0){
                        $solusi = $rute;
                        $sakit = $record['id_penyakit'];

                        header("location:periksa.php?solusi=$rute");
                    }
                    else {
                        header("location:periksa.php?rute=$rute");
                    }
                }
            break;

            case 'tidak':
                $ssql = "SELECT * FROM basis_aturan WHERE id_gejala = '$rute'";
                $query = mysqli_query($koneksi, $ssql);

                while ($record = mysqli_fetch_array($query)){
                    $rute = $record['rute'];
                    $fakta_tidak = $record['fakta_tidak'];
                    $_SESSION['keluhan'] [$_SESSION['jumlah_keluhan']] = $fakta_tidak;
                    $_SESSION['jumlah_keluhan'] += 1;

                    // memasukan nilai sementara bagian atas rumus bayes
                    $_SESSION['n_atas1'] *= 1;
                    $_SESSION['n_atas2'] *= 1;
                    $_SESSION['n_atas3'] *= 1;
                    $_SESSION['n_atas4'] *= 1;
                    $_SESSION['n_atas5'] *= 1;
                    $_SESSION['n_atas6'] *= 1;

                    if (strcmp($rute, 'final')==0){
                        $solusi = $rute;
                        $sakit = $record['id_penyakit'];

                        header("location:periksa.php?solusi=$rute&sakit=$sakit");
                    }
                    else {
                        header("location:periksa.php?rute=$rute");
                    }
                }
            break;

            case 'mulai':
                $rute = $_GET['rute'];
                header("location:periksa.php?rute=$rute");
            break;
        }
    }

?>