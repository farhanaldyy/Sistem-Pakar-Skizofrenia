<!DOCTYPE html>

<?php 
    include_once 'koneksi-db.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa</title>

    <link rel="icon" href="favicon.png" type="image/png">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">

    <style>
        .ff {
            color: #fff;
        }
        #body {
            /* background: url(img_flower.jpg) */
            background-color: #000;
        }
    </style>
</head>
<body id="body">

    <!-- Header Section -->
    <header id="header_wrapper">
        <div class="container">
            <div class="header_box">
                <div class="logo"><h2 class="ff"><b>Skizo-Check</b></h2></div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="collapse" data-target="#main-nav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span  class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="main-nav" class="collapse navbar-collapse navStyle">
                        <ul class="nav navbar-nav" id="mainNav">
                            <!-- <li><a href="index.php" class="btn btn-sm bg-primary">Kembali</a></li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Section -->

    <!-- validasi simpan informasi -->
    <?php
        if (isset($_GET['simpan'])){
                
            $simpan = $_GET['simpan'];
                
            switch ($simpan){
                case '0':
                    echo "<div class=\"alert alert-danger\" style=\" width:100%;\">";
                    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                    echo "anda telah melakukan diagnosa : <strong>Informasi Diagnosa anda tidak disimpan!";
                    echo "</div>";
                break;
                    
                case '1':
                    echo "<div class=\"alert alert-success\" style=\" width:100%;\">";
                    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                    echo "anda telah melakukan diagnosa : <strong>Informasi Diagnosa anda berhasil disimpan";
                    echo "</div>";
                break;
                    
            }
        }
    ?>
    <!-- validasi simpan informasi -->

    <!-- Hero Section -->
    <section id="hero_section" class="top_cont_outer">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_section">
                    <div class="row">
                        <div class="">
                            <div class="top_left_cont zoomIn wow animated">
                                <?php 
                                    include_once 'pertanyaan.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section -->

    <!-- Footer -->
    <footer class="footer_wrapper" id="contact_periksa">
        <div class="container">
            <div class="footer_bottom">
                <span>Copyright &copy; 2022 <a href="index.php"> Skizo-Check</a> | <a href="#">Farhan Aldiansyah Poetra</a></span>
            </div>
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