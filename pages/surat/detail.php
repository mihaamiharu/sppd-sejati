<?php
	$path = "/../../class/Surat.php";
	include $path;
	$surat = new Surat();
	$data = null;
	if(isset($_GET['no'])){
			$data = $surat->getDetail($_GET['no']);
	}
?>

<p>
	<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 300px"><b>DETAIL SURAT<br><hr color="#ff6600" style="width: 300px"><?= $_GET['no'];?>/SPPD/BDS/DivreJanten/2018</b></h5>
</p>

<center>
<?php
	if (strtotime(date('Y-m-d')) <= strtotime($data['tgl_kembali'])) {
		echo '<p><span style="width: 75px;" class="badge badge-info">Aktif</span></p>';
		if (strtotime($data['tgl_berangkat']) <= strtotime(date('Y-m-d'))) {
			echo '<div class="alert alert-primary" role="alert" style="width: 50%;">
			  		<i><b>Sedang melakukan perjalanan dinas</b></i>
				</div>';
		}elseif (strtotime(date('Y-m-d')) <= strtotime($data['tgl_berangkat'])){
			echo '<div class="alert alert-warning" role="alert" style="width: 50%;">
			  		<i><b>Akan melakukan perjalanan dinas</b></i>
				</div>';
		}
	}else{
		echo '<p><span style="width: 75px;" class="badge badge-danger">Tidak Aktif</span></p>';
	}
?>
</center>

<center>
<p style="font-family:Ubuntu;">
	<?php if($data): ?>
		<table style="width: 50%;" class="table table-striped table-hover table-light">
			<tr>
				<th style="width: 30%;">Perintah</th>
				<th>:</th>
				<td style="width: ;"> <?= $data['perintah'] ?></td>
			</tr>
			<tr>
				<th>Yang diperintahkan</th>
				<th>:</th>
				<td> <?= $data['nama_lengkap'] ?></td>
			</tr>
			<tr>
				<th>Golongan</th>
				<th>:</th>
				<td> <?= $data['golongan'] ?></td>
			</tr>
			<tr>
				<th>Maksud</th>
				<th>:</th>
				<td> <?= $data['maksud'] ?></td>
			</tr>
			<tr>
				<th>Kendaraan</th>
				<th>:</th>
				<td> <?= $data['kendaraan'] ?></td>
			</tr>
			<tr>
				<th>Tempat berangkat</th>
				<th>:</th>
				<td> <?= $data['tempat_berangkat'] ?></td>
			</tr>
			<tr>
				<th>Tempat tujuan</th>
				<th>:</th>
				<td> <?= $data['tempat_tujuan'] ?></td>
			</tr>
			<tr>
				<th>Tanggal berangkat</th>
				<th>:</th>
				<td> <?= $data['tgl_berangkat'] ?></td>
			</tr>
			<tr>
				<th>Tanggal kembali</th>
				<th>:</th>
				<td> <?= $data['tgl_kembali'] ?></td>
			</tr>
			<tr>
				<th>Lama perjalanan</th>
				<th>:</th>
				<td>
					<?php
						$berangkat = new DateTime($data['tgl_berangkat']);
						$kembali = new DateTime($data['tgl_kembali']);
						$lama = $kembali->diff($berangkat)->format("%a");
						echo $lama + 1;
					?>
				Hari
				</td>
			</tr>
			<tr>
				<th>Keterangan</th>
				<th>:</th>
				<td> <?= $data['keterangan'] ?></td>
			</tr>
			<tr>
				<th>
					Biaya perjalanan<br><p style="font-size: 10px">(Makan + Transportasi)</p>
				</th>
				<th>:</th>
				<td>
					<?php
				        $berangkat = new DateTime($data['tgl_berangkat']);
				        $kembali = new DateTime($data['tgl_kembali']);
				        $lama = $kembali->diff($berangkat)->format("%a") + 1;

				        //Uang makan
				        echo "Rp. ";
				        $uangMakan = $data['golongan'];
				        if ($uangMakan == 'A/4') {
				        	// 30000/sekali makan - Sehari/2 kali makan
							$biayaUangMakan = 60000 * $lama;
							echo number_format($biayaUangMakan);
				        }
				        else{
				        	// 35000/sekali makan - Sehari/2 kali makan
					        $biayaUangMakan = 70000 * $lama;
							echo number_format($biayaUangMakan);
				        }

				        //Biaya transportasi
				        echo " + Rp. ";
				        $transportasi = $data['kendaraan'];
				        if ($transportasi == 'Kendaraan Dinas') {
							$biayaTransportasi = 0 * $lama;
							echo number_format($biayaTransportasi);
						}elseif ($transportasi == 'Kendaraan Non Dinas') {
							$biayaTransportasi = 40000 * $lama;
							echo number_format($biayaTransportasi);
						}else{

						}

						echo " = Rp. ";
						$totalBiayaPerjalanan = $biayaUangMakan + $biayaTransportasi;
						echo number_format($totalBiayaPerjalanan);
			      	?>
				</td>
			</tr>
		</table>
		<div class="alert alert-primary" role="alert" style="width: 50%;">
		  	<i>Dibuat oleh <b><?= $data['pembuat'] ?></b> pada tanggal <b><?= $data['tgl_buat'] ?></b></i>
		</div>
	<?php endif; ?>
	
	<?php
		if (strtotime(date('Y-m-d')) <= strtotime($data['tgl_kembali'])) {
			echo '
				 <a title="Cetak SPPD" target="_blank" class="btn btn-light" href="index.php?page=surat-cetak&no='.$data['no'].'"><img src="image/print.png" width="30px">&nbsp;&nbsp;<b>SPPD</b></a>&nbsp;
				 <a title="Cetak Nota Dinas" target="_blank" class="btn btn-light" href="index.php?page=surat-cetak-nota&no='.$data['no'].'"><img src="image/print.png" width="30px">&nbsp;&nbsp;<b>Nota</b></a>&nbsp;
				 <a title="Cetak Kuitansi" target="_blank" class="btn btn-light" href="index.php?page=surat-cetak-kwitansi&no='.$data['no'].'"><img src="image/print.png" width="30px">&nbsp;&nbsp;<b>Kuitansi</b></a><br>';
		}else{
			echo '<div class="alert alert-danger" role="alert" style="width: 50%"><i>Status surat sudah <strong>tidak aktif</i></strong></div>';
		}
	?>
	<br>
	<a href="index.php?page=surat" class="btn btn-light"><img src="image/back.png" width="25px">&nbsp;&nbsp;<b>Kembali</b></a>
	<br>
	<hr color="#ff6600" style="width: 550px">
	<!--
	<a href="index.php?page=surat" class="btn btn-light"><img src="image/back.png" width="25px">&nbsp;&nbsp;<b>Kembali</b></a>
	<a href="" class="btn btn-light"><img src="image/update.png" width="25px">&nbsp;&nbsp;<b>Update</b></a>
	-->
</p>
</center>
					
				