<?php
	include "/../../class/Pegawai.php";
	$pegawai = new Pegawai;

	//mengisi atribut dengan hasil javascript delete
	$pegawai->nip = $_POST['nip'];

	//menampung hasil dari method hapus
	$error = $pegawai->delete();

	//pengecekan, !$error = berhasil
	if (!$error) {
		header("location: ../../index.php?page=pegawai");
	}else{
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../index.php?page=pegawai-detail&nip=")
	}
?>