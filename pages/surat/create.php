<?php 
if(!isset($_SESSION)){ //Jika tidak ada session, maka mulai session di mulai
    session_start(); //Session = untuk menyimpan data sementara di browser
}

$path = "class/Pegawai.php";
include $path;
$pegawai = new Pegawai();

?>

	<!-- Mengecek pesan sesion -->
	<?php if (isset($_SESSION['message'])) : ?>
		<!-- Pesan error -->
		<p>
			<div class="alert alert-danger" role="alert">
				Gagal Membuat Surat : <?= $_SESSION['message'] ?>
			</div>
		</p>
		<!-- Mengosongkan -->
		<?php unset($_SESSION['message']) ?>
	<?php endif; ?>

	<p>
		<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 400px"><b>BUAT SURAT PPD<br><hr color="#ff6600" style="width: 400px"></h5>
		<center>
		<form style="font-family:Ubuntu" method="post" action="controllers/surat/create.php" >
			<div class="form-group">
				<label for="perintah">Yang memberi perintah</label><br>
				<select class="custom-select" name="perintah" placeholder="Perintah" style="width: 400px" required>
					<option selected>Pilih</option>
				    <option value="ASEP SURAHMAN">ASEP SURAHMAN - Administratur Muda</option>
				    <option value="HENDRAWAN NUGRAHA">HENDRAWAN NUGRAHA - Wakil Administratur Muda</option>
				    <option value="FARID MARUF">FARID MARUF - Wakil Administratur Muda</option>
				</select>
			</div>
			<div class="form-group">
				<label for="nama_pegawai">Yang diperintahkan</label>
				<select id="nama_pegawai" name="no_pegawai" class="form-control" style="width: 400px">
                <option selected>Pilih Pegawai
                  <?php foreach ($pegawai->getData() as $data ): ?>
                  <option value="<?php echo $data['no_pegawai'] ?>">
                  <?php echo $data['nama_lengkap']; ?>
                  (
                  <?php echo $data['golongan']; ?>
                  )
                </option>
                <?php endforeach ?>
              </select>
			</div>
			<div class="form-group">
				<label for="maksud">Maksud perjalan dinas</label>
				<textarea type="text" class="form-control" rows="3" name="maksud" placeholder="Keterangan" style="width: 400px" required></textarea>
			</div>
			<div class="form-group">
				<label for="kendaraan">Alat angkut yang dipergunakan</label><br>
				<select class="custom-select" name="kendaraan" placeholder="Kendaraan" style="width: 400px" required>
					<option selected>Pilih Kendaraan</option>
				    <option value="Kendaraan Dinas">Kendaraan Dinas</option>
				    <option value="Kendaraan Non Dinas">Kendaraan Non Dinas</option>
				</select>
			</div>
			<div class="form-group">
				<label for="tempat_berangkat">Tempat berangkat</label>
				<input type="text" class="form-control" name="tempat_berangkat" placeholder="Tempat berangkat" style="width: 400px" required>
			</div>
			<div class="form-group">
				<label for="tempat_tujuan">Tempat tujuan</label>
				<input type="text" class="form-control" name="tempat_tujuan" placeholder="Tempat tujuan" style="width: 400px" required>
			</div>

			<!--
			<div>
				<label class="checkbox-inline"><input type="checkbox" value="">Option 1</label>
				<label class="checkbox-inline"><input type="checkbox" value="">Option 2</label>
				<label class="checkbox-inline"><input type="checkbox" value="">Option 3</label>
			</div>
			-->

			<div class="form-group">
				<label for="tgl_buat">Tanggal dibuatnya surat</label>
				<input type="date" readonly class="form-control" name="tgl_buat" style="width: 400px" value="<?php echo date("Y-m-d") ?>">
			</div>
			<div class="form-group">
				<label for="tgl_berangkat">Tanggal berangkat</label>
				<input type="date" class="form-control" name="tgl_berangkat" placeholder="Tanggal berangkat" style="width: 400px" required>
			</div>
			<div class="form-group">
				<label for="tgl_kembali">Tanggal kembali</label>
				<input type="date" class="form-control" name="tgl_kembali" placeholder="Tanggal Kembali" style="width: 400px" required>
			</div>
			<div class="form-group">
				<label for="keterangan">Keterangan</label>
				<textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder="Keterangan" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label for="pembuat">Pembuat</label>
				<input type="text" readonly class="form-control" name="pembuat" style="width: 400px" value="<?php echo $_SESSION['nama']; ?>">
			</div>
			<button type="submit" class="btn btn-light"><img src="image/create.png" width="25px">&nbsp;&nbsp;<b>Buat</b></button>
		</form>
		</center>
		<hr color="#ff6600" style="width: 400px">
	</p>

