<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" >
		<table>
			<tr>
				<td>APLIKASI PENDAFTARAN MAHASISWA</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td><input type="number" name="nim"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td><input type="text" name="email" placeholder="dyah@gmail.com"></td>
			</tr>
			<tr>
				<td><input type="submit" name="kirim" value="submit"></td>
			</tr>

		</table>
	</form>

</body>
</html>


<?php  
include "konek.php";
if (isset($_POST['kirim'])) {

	if (strlen($_POST['nim'])==10 && $_POST['nim']!="") {
		$nim = $_POST['nim'];
	}
	else{
		echo"Nim harus 10";
	}
	
	if (strlen($_POST['nama'])==20 || $_POST['nama']=="") {
		echo "Nama melebihi 20";
	}
	else{
		$nama =$_POST['nama'];
	}

	
	if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)&& $_POST['email']!=""){
		echo "email tidak sesuai";
	}else{
		$email = $_POST['email'];
	}


	if (isset($nim)&&isset($nama) && isset($email)) {
		session_start();
		$_SESSION['nim']=$nim;
		$query = mysqli_query($conn,"INSERT INTO t_jurnal1(NIM,NAMA,EMAIL) VALUES ($nim,'$nama','$email')");
		if (isset($query)) {
			echo "DATA TERSIMPAN";
			header("location:komentar.php");
		}else{
			echo "Data tidak tersimpan";
		}

	}


}





?>