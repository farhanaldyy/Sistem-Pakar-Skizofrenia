<?php 

    // NOTE : clean code / simple code, lebih disederhanakan!!

    include_once 'koneksi-db.php';

    $pertanyaan = "";
    $fin_atas1 = 0;
    $fin_atas2 = 0;
    $fin_atas3 = 0;
    $fin_atas4 = 0;
    $fin_atas5 = 0;
    $fin_atas6 = 0;
    $fin_bawah = 0;
    $prob_sakit1 = 0;
    $prob_sakit2 = 0;
    $prob_sakit3 = 0;
    $prob_sakit4 = 0;
    $prob_sakit5 = 0;
    $prob_sakit6 = 0;
    $n_atas1 = 0;
    $n_atas2 = 0;
    $n_atas3 = 0;
    $n_atas4 = 0;
    $n_atas5 = 0;
    $n_atas6 = 0;
    $id_penyakit = "";
    $sesion = "";

    /* setelah berakhirnya pertanyaan */
    if (isset($_GET['solusi'])){

        /* hasil dan solusi */
        $kesimpulan = "";
        $hasil = "";
        $solusi = $_GET['solusi'];
        $sakit = "";
 
        echo "<h2>Kondisi</h2>";
        echo "<table class=\"table table-stripped\" id=\"tabel_hasil\">";
            echo "<thead>";
                echo "<th>Nomor</th>";
                echo "<th>Kondisi Anda</th>";
            echo "</thead>";
            echo "<tbody>";
                echo "<tr>";
                    for ($counter = 0; $counter < $_SESSION['jumlah_keluhan']; $counter++){
                        $nomor = $counter + 1;
                        echo "<tr>";
                            echo "<td>$nomor</td>";
                            echo "<td>".$_SESSION['keluhan'][$counter]."</td>";
                        echo "</tr>";
                    }
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";

        //perhitungan mendapatkan diagnosa tiap penyakit berdasarkan metode naive bayes
        for ($count = 0; $count < 6; $count++){

            $npenyakit = 0;
            switch ($count){

                case '0':
                    $id_penyakit = 'P01';
                    $sesion = "'n_atas1'";
                    $n_atas1 += $_SESSION['n_atas1'];
                break;

                case '1':
                    $id_penyakit = "P02";
                    $sesion = 'n_atas2';
                    $n_atas2 += $_SESSION['n_atas2'];
                break;

                case '2':
                    $id_penyakit = 'P03';
                    $sesion = 'n_atas3';
                    $n_atas3 += $_SESSION['n_atas3'];
                break;

                case '3':
                    $id_penyakit = 'P04';
                    $sesion = 'n_atas4';
                    $n_atas4 += $_SESSION['n_atas4'];
                break;

                case '4':
                    $id_penyakit = 'P05';
                    $sesion = 'n_atas5';
                    $n_atas5 += $_SESSION['n_atas5'];
                break;

                case '5':
                    $id_penyakit = 'P06';
                    $sesion = 'n_atas6';
                    $n_atas6 += $_SESSION['n_atas6'];
                break;
            }

            $ssql = "SELECT * FROM daftar_penyakit WHERE id_penyakit = '$id_penyakit'";
            $query = mysqli_query($koneksi, $ssql);

            while ($record = mysqli_fetch_array($query)){
                $npenyakit = $record['npenyakit'];

                switch ($count){
                    case '0':
                        $fin_atas1 += $n_atas1 * $npenyakit;
                    break;

                    case '1':
                        $fin_atas2 += $n_atas2 * $npenyakit;
                    break;

                    case '2':
                        $fin_atas3 += $n_atas3 * $npenyakit;
                    break;

                    case '3':
                        $fin_atas4 += $n_atas4 * $npenyakit;
                    break;

                    case '4':
                        $fin_atas5 += $n_atas5 * $npenyakit;
                    break;

                    case '5':
                        $fin_atas6 += $n_atas6 * $npenyakit;
                    break;
                }
            }

        }

        $fin_bawah = $fin_atas1 + $fin_atas2 + $fin_atas3 + $fin_atas4 + $fin_atas5 + $fin_atas6;


        $prob_sakit1 += $fin_atas1 / $fin_bawah;
        $prob_sakit2 += $fin_atas2 / $fin_bawah;
        $prob_sakit3 += $fin_atas3 / $fin_bawah;
        $prob_sakit4 += $fin_atas4 / $fin_bawah;
        $prob_sakit5 += $fin_atas5 / $fin_bawah;
        $prob_sakit6 += $fin_atas6 / $fin_bawah;

        //testing nilai probabilitas
        // echo "<table class=\"table text-dark\" style=\"background=#ffff;\">";
        //     echo "<tr>";
        //         echo "<td>TESTING</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas1 / $fin_bawah</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas2 / $fin_bawah</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas3 / $fin_bawah</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas4 / $fin_bawah</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas5 / $fin_bawah</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$fin_atas6 / $fin_bawah</td>";
        //     echo "</tr>";
        // echo "</table>";
        

        $prob_sakit1 = round($prob_sakit1, 2);
        $prob_sakit2 = round($prob_sakit2, 2);
        $prob_sakit3 = round($prob_sakit3, 2);
        $prob_sakit4 = round($prob_sakit4, 2);
        $prob_sakit5 = round($prob_sakit5, 2);
        $prob_sakit6 = round($prob_sakit6, 2);

        // test nilai probabilitas setelah dibagi
        // echo "<table class=\"table table\" style=\"background=#fff;\">";
        //     echo "<tr>";
        //         echo "<td>TESTING</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit1</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit2</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit3</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit4</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit5</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>$prob_sakit6</td>";
        //     echo "</tr>";
        // echo "</table>";

        $prob_sakit1 *= 100;
        $prob_sakit2 *= 100;
        $prob_sakit3 *= 100;
        $prob_sakit4 *= 100;
        $prob_sakit5 *= 100;
        $prob_sakit6 *= 100;

        $total = $prob_sakit1 + $prob_sakit2 + $prob_sakit3 + $prob_sakit4 + $prob_sakit5 + $prob_sakit6;

        $hasil = $prob_sakit1;
        $penyakit = "P01";

        if ($prob_sakit2 >= $prob_sakit1){
            $hasil = $prob_sakit2;
            $penyakit = "P02";
        }
        if ($prob_sakit3 >= $prob_sakit2 && $prob_sakit3 >= $prob_sakit1){
            $hasil = $prob_sakit3;
            $penyakit = "P03";
        }
        if ($prob_sakit4 >= $prob_sakit3 && $prob_sakit4 >= $prob_sakit2 && $prob_sakit4 >= $prob_sakit1){
            $hasil = $prob_sakit4;
            $penyakit = "P04";
        }
        if ($prob_sakit5 >= $prob_sakit4 && $prob_sakit5 >= $prob_sakit3 && $prob_sakit5 >= $prob_sakit2 && $prob_sakit5 >= $prob_sakit1){
            $hasil = $prob_sakit5;
            $penyakit = "P05";
        }
        if ($prob_sakit6 >= $prob_sakit5 && $prob_sakit6 >= $prob_sakit4 && $prob_sakit6 >= $prob_sakit3 && $prob_sakit6 >= $prob_sakit2 && $prob_sakit6 >= $prob_sakit1){
            $hasil = $prob_sakit6;
            $penyakit = "P06";
        }

        //jika semua jawaban bernilai tidak
        if ($prob_sakit1 == 20 && $prob_sakit2 == 20 && $prob_sakit3 == 20 && $prob_sakit4 == 20 && $prob_sakit5 == 10 && $prob_sakit6 == 10){
            $penyakit = "P0";
            $prob_sakit1 *= 0;
            $prob_sakit2 *= 0;
            $prob_sakit3 *= 0;
            $prob_sakit4 *= 0;
            $prob_sakit5 *= 0;
            $prob_sakit6 *= 0;
            $sakit = "Anda Negatif Skizofrenia";
        }

        //menampilkan data probabilitas tiap penyakit
        $sstring = "SELECT * FROM daftar_penyakit WHERE id_penyakit = '$penyakit'";
        $query = mysqli_query($koneksi, $sstring);

        while ($record = mysqli_fetch_array($query)){
            $sakit = strtoupper($record['nama_penyakit']);
        }

        echo "<h2>Kemungkinan Terjangkit</h2>";
        echo "<table class=\"table table-striped\" id=\"tabel_hasil\">";
            echo "<thead class=\"head-table\">";
                echo "<th>Nama Penyakit</th>";
                echo "<th>Skizofrenia Paranoid</th>";
                echo "<th>Skizofrenia Hiberfrenik</th>";
                echo "<th>Skizofrenia Katonik</th>";
                echo "<th>Skizofrenia Residual</th>";
                echo "<th>Skizofrenia Simpleks</th>";
                echo "<th>Skizofrenia Tak Terinci</th>";
            echo "</thead>";
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>Kemungkinan</td>";
                    echo "<td>$prob_sakit1 %</td>";
                    echo "<td>$prob_sakit2 %</td>";
                    echo "<td>$prob_sakit3 %</td>";
                    echo "<td>$prob_sakit4 %</td>";
                    echo "<td>$prob_sakit5 %</td>";
                    echo "<td>$prob_sakit6 %</td>";
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";

        // menampilkan kesimpulan serta saran
        echo "<div class=\"kesimpulan\">";
            if ($penyakit != 'P0'){
                echo "<h5 style=\"font-size:17px;\">Anda dinyatakan mengidap $sakit</h5>";
            }
            echo "<hr>";
            echo "<h2 class=\"\">Solusi : </h2>";
            $ssql = "SELECT * FROM daftar_solusi WHERE id_penyakit = '$penyakit'";
            $query = mysqli_query($koneksi, $ssql);

            while ($record = mysqli_fetch_array($query)){
                $kesimpulan = $record['solusi'];
                echo "<h5 id=\"hasil_text\">$kesimpulan</h5>";
            }
            echo "<hr>";
                echo "<div class=\"row\">";
                    echo "<div class=\"col-lg-2 col-sm-7\">";
                        echo "<br>";
                        echo "<a href=\"pasca-periksa.php?aksi=simpan&sakit=$sakit&solusi=$kesimpulan\" class=\"read_more2\">Simpan Informasi</a>";
                    echo "</div>";
                    echo "<div class=\"col-lg-5 col-sm-7\">";
                        echo "<br>";
                        echo "<a href=\"pasca-periksa.php?aksi=buang\" class=\"read_more2\">Hapus Informasi</a>";
                    echo "</div>";
                echo "</div>";
        echo "</div>";

    }

    /* pertanyaan untuk proses diagnosa */
    else if (isset($_GET['rute'])){
        include_once 'koneksi-db.php';

        $rute = $_GET['rute'];

        $sstring = "SELECT * FROM basis_aturan WHERE id_gejala = '$rute'";
        $query = mysqli_query($koneksi, $sstring);

        while ($record = mysqli_fetch_array($query)){
            $kdGejala = $record['id_gejala'];
            $pertanyaan = $record['pertanyaan'];
        }

        //testing nilai session jumlah keluhan, n_atas1, n_atas2.... n_atas6
        // echo "<table class=\"table table\" style=\"background:#fff;\">";
        //     echo "<tr>";
        //         echo "<td>TESTING</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['jumlah_keluhan']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas1']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas2']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas3']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas4']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas5']."</td>";
        //     echo "</tr>";
        //     echo "<tr>";
        //         echo "<td>".$_SESSION['n_atas6']."</td>";
        //     echo "</tr>";
        // echo "</table>";

        echo "<div class=\"periksa\">";
        echo "<h2><strong>Pertanyaan ($kdGejala) : </strong></h2>";
        echo "<h2>$pertanyaan</h2>";
            echo "<div class=\"row\">";
                echo "<div class=\"col-lg-4 col-sm-7\">";
                    echo "<a href=\"proses-periksa.php?jawaban=benar&rute=$rute\" class=\"read_more2\">Benar</a>";
                echo "</div>";
                echo "<div class=\"col-lg-5 col-sm-7\">";
                    echo "<a href=\"proses-periksa.php?jawaban=tidak&rute=$rute\" class=\"read_more2\">Tidak</a>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    else {
        echo "<div class=\"row\">";
            echo "<h2 class=\"text-dark\"><strong>Diagnosa Mandiri</strong></h2>";
            echo "<div>";
                echo "<p class=\"text-dark\">Disini, anda dapat melakukan diagnosa untuk mengetahui apakah mengidap penyakit skizofrenia tertentu atau tidak. Disini hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi atau keluhan yang dirasakan saat ini. Kemudian sistem akan melakukan diagnosa berdasarkan jawaban yang disimpan.</p>";
            echo "</div>";
            echo "<div class=\"col-lg-2 col-sm-7\">";
                        echo "<br>";
                        echo "<a href=\"index.php\" class=\"read_more2\">Kembali</a>";
            echo "</div>";
            echo "<div class=\"col-lg-2 col-sm-7\">";
                        echo "<br>";
                        echo "<a href=\"riwayat-diagnosa.php\" class=\"read_more2\">Riwayat Diagnosa</a>";
            echo "</div>";
            echo "<div class=\"col-lg-5 col-sm-7\">";
                        echo "<br>";
                        echo "<a href=\"proses-periksa.php?jawaban=mulai&rute=G01\" class=\"read_more2\">Mulai Diagnosa</a>";
            echo "</div>";
        echo "</div>";
    }

?>