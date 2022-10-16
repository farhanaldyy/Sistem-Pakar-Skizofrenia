<!DOCTYPE html>

<?php 
    include_once 'koneksi-db.php';
    unset ($_SESSION['keluhan']);
    unset ($_SESSION['jumlah_keluhan']);
    unset ($_SESSION['n_atas1']);
    unset ($_SESSION['n_atas2']);
    unset ($_SESSION['n_atas3']);
    unset ($_SESSION['n_atas4']);
    unset ($_SESSION['n_atas5']);
    unset ($_SESSION['n_atas6']);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skizo-Check</title>

    <link rel="icon" href="favicon.png" type="image/png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <script href="assets/js/datepicker.js"></script>

    <style type="text/css">
        .ff {
            color: #fff;
        }
        #tes_skizo {
            height: 500px;
            padding-top:60px;
	        padding-bottom:0px;
	        background:#3498db;
	        color:#DADADA;
        }
        #tes_skizo h2, #tes_skizo h3 {
             color:#fff;
        }
        #hero_section {
            padding-top:100px;
            background: url(assets/img/hand.jpg);
            background-size: cover;
            height: 610px;
        }
        #aboutUs {
            height: 550px;
        }
    </style>

</head>
<body>

    <!-- Header Section -->
    <header id="header_wrapper">
        <div class="container">
            <div class="header_box">
                <div class="logo"><h2 class="ff"><b>Skizo-Check</b></h2></div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    </div>
                    <div id="main-nav" class="collapse navbar-collapse navStyle">
                        <ul class="nav navbar-nav" id="mainNav">
			                <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
			                <li><a href="#aboutUs" class="scroll-link">Tentang Skizofrenia</a></li>
			                <li><a href="#tes_skizo" class="scroll-link">Konsultasi</a></li>
			                <li><a href="#contact" class="scroll-link">Metode</a></li>
			                <!-- <li><a href="daftar-user.php" class="scroll-link">Daftar</a></li> -->
			            </ul> 
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Section -->

    <!-- cek login -->
    <?php
    if (isset($_GET['valid'])){
        echo "<div class=\"alert alert-danger\" style=\" width:100%;\">";
        echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
        echo "<strong>PERHATIAN!</strong> User ID atau Password Salah.Hanya User yang terdaftar yang dapat mengakses layanan \"TES SKIZOFRENIA\".";
        echo "</div>";
    }  
    ?>
    <!-- cek login -->

    <!-- Hero Section -->
    <section id="hero_section" class="top_cont_outer">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_section">
                    <div class="row">
                        <div class="top_left_cont zoomIn wow animated">
                            <h2 class="text-dark">Selamat datang di <strong>Skizo-Check</strong> (Skizofrenia Checker)</h2>
                            <p class="text-dark">
                                Skizo-Check merupakan sistem pakar untuk mendiagnosa penyakit skizofrenia berbasis web. Skizo-Check bertujuan untuk memberikan informasi kepada masyarakat luas tentang apa itu skizofrenia serta langkah apa saja yang harus dilakukan jika memang ada yang mengidap penyakit tersebut. untuk melakukan proses konsultasi <b>Anda harus login jika tidak mempunyai akun silahkan untuk mendaftar</b>
                            </p>
                            <div class="col-lg-2 col-sm-9">
                                <a href="#tes_skizo" class="read_more2">KONSULTASI</a>
                            </div>
                            <div class="col-lg-4 col-sm-9">
                                <a href="daftar-user.php" class="read_more2">DAFTAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section -->

    <!-- About US -->
    <section id="aboutUs">
        <div class="inner_wrapper">
            <div class="container">
                <h2>TENTANG SKIZOFRENIA</h2><hr>
                <div class="inner_section">
                    <div class="row">
                        <div>
                            <div class="delay-01s animated fadeInDown wow animated">
                                <h3>Berikut adalah penjelasan secara umum tentang penyakit Skizofrenia</h3><br/>
                                <p>
                                    Pengertian penyakit kejiwaan Skizofrenia memiliki banyak variasi menurut <strong>Prabowo (2014)</strong> penyakit skizofrenia adalah orang yang mengalami gangguan emosi, pikiran, dan perilaku. Teori tentang faktor risiko skizofrenia adalah faktor organobiologik (genetika, virus, & malnutrisi janin), psikoreligius, dan psikososial termasuk diantaranya adalah psikologis, sosio-demografi, sosio-ekonomi, sosio-budaya, migrasi penduduk, dan kepadatan penduduk di lingkungan pedesaan dan perkotaan. <strong>(Agung Wahyudi, 2016).</strong>
                                </p><br/>
                                <p>
                                    Penyebab dari penyakit kejiwaan skizofrenia diantaranya adalah 1) Biologi:yaitu genetik neurobiologi dan peningkatan dopamine 2)Psikologis: ketidak harmonisan keluarga yang berdampak meningkatkan resiko penyakit kejiwaan Skizofrenia. Stressor sosiokultural adalah stress yang menumpuk dapat menunjang terhadap awitan skizofrenia dan faktor psikotik lainnya. <strong>(Dilfera Hermiati, 2018).</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US -->

    <!-- Test Skizofrenia -->
    <section id="tes_skizo">
        <div class="inner_wrapper">
            <div class="container">
                <h2><strong>Konsultasi</strong></h2>
                <hr class="bg-secondary">
                <div class="inner_section">
                    <div class="row">
                        <div class="">
                            <div class="delay-01s animated fadeInDown wow animated">
                                <h3><strong>Skizo-Check</strong> menyediakan layanan untuk mendiagnosa secara mandiri apakah anda mengidap skizofrenia atau tidak</h3><br/>
                                <p>
                                    Keakuratan informasi yang diberikanpun tidak jauh berbeda dengan seorang dokter karena <strong>Skizo-Check</strong> bekerja sama dengan pakar kejiwaan serta mengambil data dari jurnal - jurnal yang berkaitan. Untuk melakukan tes, anda akan diberikan beberapa pertanyaan tentang kondisi anda saat ini, dan dibagian akhir anda dapat melihat hasil serta solusi dari sistem pakar.
                                </p><br/>
                            </div>
                            <div class="work_bottom">
                                <!-- <a href="periksa.php" class="contact_btn">MULAI</a> -->
                                <div class="work_bottom"><a class="contact_btn" data-toggle="modal" data-target="#myModal">MULAI</a> </div> 
                            </div> <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Test Skizofrenia -->

    <!-- Login Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="background:#3a943d;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                </div>
		        <form method="POST" action="user-login.php">
			        <div class="modal-body">
				        <table class="table">
					        <tbody>
                                <tr>
                                <h4>Anda harus login</h4>
                                </tr>
                                <tr style="background:#fff;">
                                    <td>Nama</td>
                                    <td><input autofocus type="text" name="nama"/></td>
                                </tr>
                                <tr>
							        <td>Password</td>
							        <td><input type="password" name="password"/></td>
						        </tr>
					        </tbody>
				        </table>
			        </div>
			        <div class="modal-footer">
				        <button type="submit" class="btn btn-success" value="Submit">Login</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
		        </form>
            </div>
        </div>
    </div>
    <!-- Login Modal -->

    <!-- Footer -->
    <footer class="footer_wrapper" id="contact">
        <div class="container">
            <section class="page_section contact" id="contact">
                <div class="contact_section">
                    <h2><strong>METODE</strong></h2><hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <h2 style="font-size:20pt;">Analisis</h2>
                            <p style="text-align:justify;">
                                Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan dengan bantuan seorang pakar maupun pengetahuan lainnya seperti buku dan jurnal atau paper.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h2 style="font-size:20pt;">Basis Pengetahuan</h2>
                            <p style="text-align:justify;">
                                Data yang didapatkan dari pakar dan jurnal berupa probabilitas tentang berapa penyakit skizofrenia beserta dengan gejalanya. Data ini kemudian dijadikan atau digunakan untuk menentukan basis aturan sistem pakar ini dalam menentukan keputusan. 
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h2 style="font-size:20pt;">Hasil Diagnosa</h2>
                            <p>
                                Pasa sistem pakar ini (Skizo-Check), hasil dari proses diagnosa menggunakan metode naive bayes akan memberikan solusi terhadap penyakit yang di idap, serta hasil akurasi menggunakan metode naive bayes cukup akurat.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="footer_bottom"><span>Copyright &copy; 2022 <a href="index.php">Skizo-Check</a> | <a href="#">Farhan Aldiansyah Poetra</a></span></div>
        </div>
    </footer>
    <!-- Footer -->

    <script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="assets/js/jquery.nav.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/jquery.isotope.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>