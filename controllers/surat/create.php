<?php
	include "../../class/Surat.php";
	$surat = new Surat();

	$surat->no = $_POST['no'];
	$surat->perintah = $_POST['perintah'];
	$surat->no_pegawai = $_POST['no_pegawai'];
	$surat->maksud = $_POST['maksud'];
	$surat->kendaraan = $_POST['kendaraan'];
	$surat->tempat_berangkat = $_POST['tempat_berangkat'];
	$surat->tempat_tujuan = $_POST['tempat_tujuan'];
	$surat->tgl_buat = $_POST['tgl_buat'];
	$surat->tgl_berangkat = $_POST['tgl_berangkat'];
	$surat->tgl_kembali = $_POST['tgl_kembali'];
	$surat->keterangan = $_POST['keterangan'];
	$surat->pembuat = $_POST['pembuat'];

	$error = $surat->create();

	if(!$error) {
		header("location: ../../index.php?page=surat");
	} else {
		session_start();
		$_SESSION['message'] = $error;
		header("location: ../../index.php?page=home");
	}
?>