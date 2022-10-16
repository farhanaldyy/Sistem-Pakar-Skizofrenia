<!doctype html>
<html style="background:#000;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Skizo-Check/Daftar-user</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 
<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="assets/css/animate.css" rel="stylesheet" type="text/css">
 

<script src="assets/js/respond-1.1.0.min.js"></script>
<script src="assets/js/html5shiv.js"></script>
<script src="assets/js/html5element.js"></script>


<style>
    .ff {
        color: #fff;
    }
</style>

</head>
<body>

<!--Header_section-->
    <header id="header_wrapper">
        <div class="container">
            <div class="header_box">
                <div class="logo"><h2 class="ff"><b>Skizo-Check</b></h2></div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="collapse" data-target="#main-nav">
                            <span class="sr-only">Toggle Navigation</span>
                        </button>
                    </div>
                    <div id="main-nav" class="collapse navbar-collapse navStyle">
                        <ul class="nav navbar-nav" id="mainNav">
                            <li><a href="index.php" class="btn btn-sm bg-primary">Kembali</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
<!--Header_section--> 

<!--daftar-->
    <section id="daftar">
        <?php
        if (isset($_GET['berhasil'])){
                
            $berhasil = $_GET['berhasil'];
                
            switch ($berhasil){
                case '0':
                    echo "<div class=\"alert alert-danger\" style=\"position:fixed; width:100%;\">";
                    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                    echo "<strong>GAGAL INPUT!</strong> User ID atau Password mungkin sudah pernah dipakai \"TES SKIZOFRENIA\".";
                    echo "</div>";
                break;
                    
                case '1':
                    echo "<div class=\"alert alert-success\" style=\"position:fixed; width:100%;\">";
                    echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
                    echo "<strong>BERHASIL!</strong> Selamat anda sudah terdaftar menjadi member \"TES SKIZOFRENIA\".";
                    echo "</div>";
                break;
                    
                }
            }
        ?>
        <div class="container">
            <section class="page_section contact" id="contact">
                <div class="contact_section">
                    <h2>Daftarkan Diri Sebagai User</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 wow fadeInLeft delay-06s">
                        <form class="form" method="POST" action="proses-daftar.php">
                            <h3>Nama</h3>
                            <input class="input-text" type="text" name="nama">
                            <h3>Tanggal Lahir</h3>
                            <input class="input-text demo_ranged" id="inputField" type="date" name="lahir">
                            <h3>Jenis Kelamin</h3>
                            <select class="input-text" name="sel_gender">
                                <option name="sel_gender" value="pria">Pria</option>
                                <option name="sel_gender" value="wanita">Wanita</option>
                            </select>
                            <h3>Password</h3>
                            <input class="input-text" type="password" name="pass_signup">
                            <input class="input-btn" type="submit" value="DAFTAR">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
<!--daftar-->

<!--Footer-->
    <footer class="footer_wrapper" id="contact_periksa">
        <div class="container">
            <section class="page_section contact" id="contact_periksa">
            </section>
        </div>
        <div class="container">
            <div class="footer_bottom"><span>Copyright &copy; 2022 <a href="index.php">Skizo-Check</a> | <a href="#">Farhan Aldiansyah Poetra</a></span></div>
        </div>
    </footer>

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