<?php
	include "/../../class/Pegawai.php";
	$pegawai = new Pegawai();

	//mengisi atribut dengan hasil dari inputan
	$pegawai->nip = $_POST['nip'];
	$pegawai->nama_lengkap = $_POST['nama_lengkap'];
	$pegawai->jenjang = $_POST['jenjang'];
	$pegawai->golongan = $_POST['golongan'];
	$pegawai->jabatan = $_POST['jabatan'];
	$pegawai->gaji_pokok = $_POST['gaji_pokok'];
	$pegawai->tunjangan = $_POST['tunjangan'];

	$error = $pegawai->create();

	//pengecekan sukses atau error, $error = berhasil
	if (!$error) {
		//memanggil tampilan detail
		header("location: ../../index.php?page=pegawai-detail&nip={$pegawai->nip}");
	}else{
		//membuat session untuk menampilan pessan error bernama message
		session_start();
		$_SESSION['message'] = $error;
		//memanggil kembali page create
		header("location: ../../index.php?page=pegawai-create");
	}
?>