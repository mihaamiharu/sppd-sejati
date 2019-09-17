<?php 
	include "/../../class/Pegawai.php";
	$pegawai = new Pegawai();
	
	//mengisi attribute dengan hasil dari inputan
	$pegawai->nip = $_POST['nip'];
	$pegawai->nama_lengkap = $_POST['nama_lengkap'];
	$pegawai->jenjang = $_POST['jenjang'];
	$pegawai->golongan = $_POST['golongan'];
	$pegawai->jabatan = $_POST['jabatan'];
	$pegawai->gaji_pokok = $_POST['gaji_pokok'];
	$pegawai->tunjangan = $_POST['tunjangan'];
	
	//menampung hasil dari method create 
	$error = $pegawai->update($_POST['nip']);
	
	//pengecekan error atau berhasil, !$error = berhasil
	if(!$error){
		//memanggil tampilkan untuk menampilkan pesan error dengan mengirimkan page dan nip
		header("location: ../../index.php?page=pegawai-detail&nip={$pegawai->nip}");
	} else {
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan update kambali
		header("location: ../../index.php?page=pegawai-update");
	}
?>