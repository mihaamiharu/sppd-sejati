<?php
	include "/../../class/Pegawai.php";
	$pegawai = new Pegawai();
	$data = null;
	if (isset($_GET['nip'])) {
		$data = $pegawai->getDetail($_GET['nip']);
	}
?>

<p>
	<h5 style="font-family:Ubuntu; text-align:center;"><b><hr color="#ff6600" style="width: 550px">DETAIL DATA PEGAWAI<hr color="#ff6600" style="width: 550px"></b></h5>
</p>

<center>
<p style="font-family:Ubuntu;">
	<?php if($data): ?>
		<table style="width: 550px;" class="table table-striped table-hover table-light">
			<tr>
				<th style="width: 150px;">NPK</th>
				<th>:</th>
				<td>KPH<?= $data['nip'] ?></td>
			</tr>
			<tr>
				<th>Nama Lengkap</th>
				<th>:</th>
				<td> <?= $data['nama_lengkap'] ?></td>
			</tr>
			<tr>
				<th>Jenjang</th>
				<th>:</th>
				<td> <?= $data['jenjang'] ?></td>
			</tr>
			<tr>
				<th>Golongan</th>
				<th>:</th>
				<td> <?= $data['golongan'] ?></td>
			</tr>
			<tr>
				<th>Jabatan</th>
				<th>:</th>
				<td> <?= $data['jabatan'] ?></td>
			</tr>
			<tr>
				<th>Gaji Pokok</th>
				<th>:</th>
				<td><?php echo "Rp. "; ?><?= number_format($data['gaji_pokok']) ?></td>
			</tr>
			<tr>
				<th>Tunjangan</th>
				<th>:</th>
				<td><?php echo "Rp. "; ?><?= number_format($data['tunjangan']) ?></td>
			</tr>
			<tr>
				<th>Gaji Total<br><p style="font-size: 10px">(Gaji Pokok + Tunjangan)</p></th>
				<th>:</th>
				<td><?php echo "Rp. "; ?><?= number_format($data['gaji_pokok'] + $data['tunjangan']) ?></td>
			</tr>
		</table>
	<?php endif; ?>
	<a href="index.php?page=pegawai" class="btn btn-light"><img src="image/back.png" width="25px">&nbsp;&nbsp;<b>Kembali</b></a>
	<a href="index.php?page=pegawai-update&nip= <?php echo $data['nip']; ?>" class="btn btn-light"><img src="image/update.png" width="25px">&nbsp;&nbsp;<b>Perbaharui</b></a>
	<a href="" class="btn btn-light"><img src="image/delete.png" width="25px">&nbsp;&nbsp;<b>Hapus</b></a>
	<hr color="#ff6600" style="width: 550px">
</p>
</center>