<?php
	session_start();
	include_once "/../../class/Database.php";
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$db = new Database();
	$dbConnect = $db->connect();
	$data = mysqli_query($dbConnect,"SELECT * from admin where username='$username' and password='$password'");
	$cek = mysqli_num_rows($data);

	if($cek > 0 ) {
		while ($rows = mysqli_fetch_array($data)):

        $_SESSION['nama'] = $rows['nama'];
		$_SESSION['username'] = $username;
		
		header("location:../../index.php");
		endwhile;
	}else {
		echo "<script>alert('Login Gagal')</script>";
		header("location:../../login.php");
	}
?>
