<?php
	$path = "/../../class/Surat.php";
	include $path;
	$surat = new Surat();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Filtering data dengan jQuery-->
<script>
	$(document).ready(function(){
 		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
    	$("#surat tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    		});
  		});
	});
</script>

<p>
	<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 300px"><b>DATA SURAT</b><br><hr color="#ff6600" style="width: 300px"></h5>
</p>

<p>
	<center>
		<table>
			<tr>
				<th><input id="myInput" class="form-control" style="font-family:Ubuntu; width: 240px"type="text" placeholder="Cari surat disini..."></th>
				<th>&nbsp;&nbsp;<a href="#bottom" title="Ke bawah" class="btn btn-light"><img src="image/bottom.png" width="20px"></a></th>
			</tr>
		</table>
	<br>
	<table class="table table-bordered table-hover table-light" style="font-family:Ubuntu;">
		<thead>
			<tr>
				<th class="text-center" style="width: 8%;">No Surat </th>
				<th class="text-center" style="width: 16%;">Perintah </th>
				<th class="text-center" style="width: 16%;">Nama Pegawai </th>
				<th class="text-center" style="width: 35%;">Maksud</th>
				<th class="text-center" style="width: 10%;">Status</th>
				<th class="text-center" style="width: 15%;">Aksi</th>
			</tr>
		</thead>
		<tbody id="surat">
			<?php $no=1?>
			<?php foreach($surat->getData() as $data) : ?>
			<tr>
				<td class="text-center"> <?php echo $no++?></td>
				<td> <?= $data['perintah'] ?> </td>
				<th> <?= $data['nama_lengkap'] ?> </th>
				<td> <?= $data['maksud'] ?> </td>
				<td class="text-center">
					<?php
						if (strtotime(date('Y-m-d')) <= strtotime($data['tgl_kembali'])) {
							echo '<p><span style="width: 75px;" class="badge badge-info">Aktif</span></p>';
						}else{
							echo '<p><span style="width: 75px;" class="badge badge-danger">Tidak Aktif</span></p>';
						}
					?>
				</td>
				<td class="text-center">
					<a title="Detail" href="index.php?page=surat-detail&no= <?php echo $data['no']; ?>">
						<img src="image/detail.png" width="30px">
					</a>&nbsp;

					<!--
					<a href="index.php?page=surat-cetak&no='.$data['no'].'" target="_blank" onclick="window.open('index.php?page=surat-cetak-nota&no='.$data['no'].''); window.open('index.php?page=surat-cetak-kwitansi&no='.$data['no'].'');">Click Here</a>
					-->

					<?php
						if (strtotime(date('Y-m-d')) <= strtotime($data['tgl_kembali'])) {
							echo '<a title="Cetak SPPD" target="_blank" href="index.php?page=surat-cetak&no='.$data['no'].'"><img src="image/print.png" width="30px"></a>';
						}else{
							echo '<a title="Denied" href="" ><img src="image/cancel-2.png" width="30px"></a>';
						}
					?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<hr color="#ff6600" id="bottom">
	<a href="#top" class="btn btn-light"><img src="image/top.png" width="20px"></a>
</p>