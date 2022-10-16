<?php
	include_once 'koneksi-db.php';
?>
<?php
	if (isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		$sakit = $_GET['sakit'];
		$solusi = $_GET['solusi'];
		
		switch ($aksi){
			
			case 'simpan':
			$now = date ('Y-m-d');
			$ssql = "UPDATE daftar_user SET tgl_diagnosa = '$now', keterangan = '$sakit', solusi= '$solusi' WHERE id_pasien ='". $_SESSION['user']."'";
			$query = mysqli_query($koneksi, $ssql);
			
			unset ($_SESSION['keluhan']);
			unset ($_SESSION['jumlah_keluhan']);
			unset ($_SESSION['keluhan']);
			unset ($_SESSION['jumlah_keluhan']);
			unset ($_SESSION['n_atas1']);
			unset ($_SESSION['n_atas2']);
			unset ($_SESSION['n_atas3']);
			unset ($_SESSION['n_atas4']);
			unset ($_SESSION['n_atas5']);
			unset ($_SESSION['n_atas6']);
			header ('location:periksa.php?simpan=1');
			break;
			
			case 'buang':
			unset ($_SESSION['keluhan']);
			unset ($_SESSION['jumlah_keluhan']);
			unset ($_SESSION['n_atas1']);
			unset ($_SESSION['n_atas2']);
			unset ($_SESSION['n_atas3']);
			unset ($_SESSION['n_atas4']);
			unset ($_SESSION['n_atas5']);
			unset ($_SESSION['n_atas6']);
			header ('location:periksa.php?simpan=0');
			break;
		}
	}
?>