<?php
	include_once 'koneksi-db.php';
?>
<?php
	$valid = 0;
	
	$user = $_POST['nama'];
	$lahir = $_POST['lahir'];
	$gender = $_POST['sel_gender'];
	$pass = $_POST['pass_signup'];

	$birthDt = new DateTime($lahir);
	$today = new DateTime('today');
	$y = $today->diff($birthDt)->y;
	
	for ($counter = 0; $counter < 2; $counter++){
		
		if ($counter == 0){
			$comp = $user;
			$param = "nama";
		}
		else if ($counter > 0){
			$comp = $pass;
			$param = "password";
		}
		
		$ssql = "SELECT * FROM daftar_user WHERE $param = '$comp'";
		$query = mysqli_query ($koneksi, $ssql);
		$result = mysqli_num_rows($query);
	
		if ($result > 0){
			$valid += 1;
		}
	}
	
	if ($valid >= 2){
		header ('location:daftar-user.php?berhasil=0');
	}
	else {
		$ssql = "INSERT INTO daftar_user (nama, password, jenis_kelamin, usia) VALUES ('$user', '$pass', '$gender', '$y')";
		$query = mysqli_query($koneksi, $ssql);
		header ('location:daftar-user.php?berhasil=1');
		
	}
	?>