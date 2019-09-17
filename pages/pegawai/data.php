<?php
	include "/../../class/Pegawai.php";
	$pegawai = new Pegawai();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Filtering data dengan jQuery-->
<script>
	$(document).ready(function(){
 		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
    	$("#pegawai tr").filter(function() {
      		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    		});
  		});
	});
</script>

<p>
	<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 300px"><b>DATA PEGAWAI</b><br><hr color="#ff6600" style="width: 300px"></h5>
</p>

<p>
	<center>
		<table>
			<tr>
				<th><input id="myInput" class="form-control" style="font-family:Ubuntu; width: 240px"type="text" placeholder="Cari disini..."></th>
				<th>&nbsp;&nbsp;<a href="#bottom" title="Ke bawah" class="btn btn-light"><img src="image/bottom.png" width="20px"></a></th>
			</tr>
		</table><br>
		
	<table class="table table-bordered table-hover table-light" style="font-family:Ubuntu; width: 85%">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center" style="width: 20">NPK</th>
				<th class="text-center">Nama Pegawai</th>
				<th class="text-center">Jenjang</th>
				<th class="text-center">Golongan</th> 
				<th class="text-center">Aksi</th>
			</tr>
		</thead>
		<tbody  id="pegawai">
			<?php
				$no = 1;
				foreach($pegawai->getData() as $data) :
			?>
				<tr>
					<td class="text-center"> <?= $data['no_pegawai'] ?></td>
					<td class="text-center">PHT<?= $data['nip'] ?></td>
					<td> <?= $data['nama_lengkap'] ?></td>
					<td class="text-center"> <?= $data['jenjang'] ?></td>
					<td class="text-center"> <?= $data['golongan'] ?></td>
					<td class="text-center">
						<a title="Detail" href="index.php?page=pegawai-detail&nip= <?php echo $data['nip']; ?>">
							<img src="image/detail.png" width="30px">
						</a>&nbsp;
						<a title="Perbaharui" href="index.php?page=pegawai-update&nip= <?php echo $data['nip']; ?>">
							<img src="image/update.png" width="30px">
						</a>&nbsp;
						<a title="Hapus" href="" onclick="deleteThis(<?php echo $data['nip']; ?>)" >
							<img src="image/delete.png" width="30px">
						</a>
					</td>
				</tr>
			<?php endforeach; ?>	
		</tbody>
	</table>
	<hr color="#ff6600" id="bottom">
	<a href="#top" title="Kembali ke atas" class="btn btn-light"><img src="image/top.png" width="20px"></a>
	</center>
</p>

<script>
	function deleteThis(nip){
		if (confirm("Hapus Data Pegawai?")) {
			$.ajax({
				type: 'post',
				url: 'controllers/pegawai/delete.php',
				data: {nip:nip},
				success: function(data){
					if (data) {
						alert('Data telah dihapus');
						window.location= "index.php?page=pegawai";
					}else{
						alert("Tidak bisa menghapus");
					}
				}
			})
		}
	}
</script>