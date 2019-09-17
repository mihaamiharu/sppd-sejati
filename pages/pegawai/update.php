<?php 
if(!isset($_SESSION)){ //Jika tidak ada session, maka mulai session di mulai
    session_start(); //Session = untuk menyimpan data sementara di browser
}

if($page == "pegawai-update") :?>
	<?php
		//sama seperti tampilan detail, untuk membuat form update
		// diperlukan 1 data dari student-create
		include "/../../class/Pegawai.php";
		$pegawai = new Pegawai();
		$data = null;
		if(isset($_GET['nip'])){
			//mengambill semua data berdasarkan nip
			$data = $pegawai->getDetail($_GET['nip']);
		}
	?>
	<p>
		<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 400px"><b>PERBAHARUI DATA PEGAWAI<br><hr color="#ff6600" style="width: 400px">
		NIP : <?= $_GET['nip']?> </h5>
		<form method="post" action="controllers/pegawai/update.php" style="font-family:Ubuntu; text-align:center;">
			<center>
			<form method="post" action="update.php" style="font-family:Ubuntu; text-align:center;">
				<div class="form-group" >
				<!-- NIP disembunyikan -->
					<input type="hidden" class="form-control" name="nrp" value="<?= $data["nip"]?>" style="width: 400px">
				</div>
				<div class="form-group">
					<label for="nama_lengkap">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama_lengkap" value="<?= $data["nama_lengkap"]?>" style="width: 400px">		
				</div>
				<div class="form-group">
					<label for="jenjang">Jenjang</label>
					<input type="text" class="form-control" name="jenjang" value="<?= $data["jenjang"]?>" style="width: 400px">		
				</div>
				<div class="form-group">
					<label for="golongan">Golongan</label>
					<input type="text" class="form-control" name="golongan" value="<?= $data["golongan"]?>" style="width: 400px">		
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input type="text" class="form-control" name="jabatan" value="<?= $data["jabatan"]?>" style="width: 400px">		
				</div>
				<div class="form-group">
					<label for="gaji_pokok">Gaji Pokok</label>
					<input type="text" class="form-control" name="gaji_pokok" value="<?php echo "Rp. "; ?><?= number_format($data["gaji_pokok"]) ?>" style="width: 400px">		
				</div>
				<div class="form-group">
					<label for="gaji">Tunjangan</label>
					<input type="text" class="form-control" name="tunjangan" value="<?php echo "Rp. "; ?><?= number_format($data["tunjangan"]) ?>" style="width: 400px">		
				</div>
			<a href="index.php?page=pegawai" class="btn btn-light"><img src="image/back.png" width="25px">&nbsp;&nbsp;<b>Kembali</b></a>&nbsp;
			<button type="submit" class="btn btn-light"><img src="image/update.png" width="25px">&nbsp;&nbsp;<b>Ubah</b></button>
			</form>	
		<hr color="#ff6600" style="width: 400px">
		</form>
	</p>
<?php endif; ?>