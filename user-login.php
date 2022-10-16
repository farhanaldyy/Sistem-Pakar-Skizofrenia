<?php
	include_once 'koneksi-db.php';
?>

<?php
	
	if (isset($_POST['nama']) && isset($_POST['password']) ){
		//proses validasi username dan password
		$valid = 0;
		
		$nama = $_POST['nama'];
		$pass = $_POST['password'];
		
		$ssql = "SELECT * FROM daftar_user WHERE nama = '$nama'";
		$query = mysqli_query($koneksi, $ssql);
		$result = mysqli_num_rows($query);
		
		echo "$ssql <br/>";
		
		if ($result > 0) {
			$valid += 1;
		}
		
		$ssql = "SELECT * FROM daftar_user WHERE password = '$pass'";
		$query = mysqli_query($koneksi, $ssql);
		$result = mysqli_num_rows($query);
		
		echo "$ssql <br/>";
		
		if ($result > 0) {
			$valid += 1;
		}
		
		//cek validasi
		if ($valid >= 2){
			$ssql = "SELECT * FROM daftar_user WHERE nama = '$nama' AND password = '$pass'";
			$query = mysqli_query($koneksi, $ssql);
			
			while ($record = mysqli_fetch_array($query)){
				$_SESSION['user'] = $record['id_pasien'];
			}
			header ('location:periksa.php');
		}
		else{
			header ('location:index.php?valid=0');
		}
	}
?>