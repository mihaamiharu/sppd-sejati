<?php 
if(!isset($_SESSION)){ //Jika tidak ada session, maka mulai session di mulai
    session_start(); //Session = untuk menyimpan data sementara di browser
}

if(isset($_SESSION['message'])): ?>
    <!-- Jika terdapat error maka munculkan pesan pada session yang telah di buat -->
    <p>
        <div class="alert alert-danger" role="alert">
            Gagal Menyimpan Data Pegawai : <?= $_SESSION['message'] ?>
        </div>
    </p>
    <!-- Mengosongkan session message agar pesan tidak muncul kembali -->
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
	
	<center>
		<form style="font-family:Ubuntu; width: 800px" method="post" action="controllers/pegawai/create.php" >
			<h5 style="font-family:Ubuntu; text-align:center;"><hr color="#ff6600" style="width: 550px"><b>TAMBAH DATA PEGAWAI<br><hr color="#ff6600" style="width: 550px"></h5>


			<div class="form-group row">
				<label for="nip" class="col-sm-2 col-form-label" style="text-align: right;">NPK</label>
				<input type="text" class="form-control" name="nip" maxlength="17" placeholder="NPK (17 digit)" style="width: 550px" required>
			</div>
			<div class="form-group row">
				<label for="nama_lengkap" class="col-sm-2 col-form-label" style="text-align: right;">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" style="width: 550px"required>
			</div>
			<div class="form-group row">
				<label for="jenjang" class="col-sm-2 col-form-label" style="text-align: right;">Jenjang</label><br>
				<select class="custom-select" id="inputGroupSelect02" name="jenjang" placeholder="Jenjang" style="width: 550px" required>
					<option selected>Pilih Jenjang</option>
				    <option value="IIB">IIB</option>
				    <option value="IIIB">IIIB</option>
				    <option value="IV">IV</option>
				    <option value="V">V</option>
				    <option value="VI">VI</option>
				</select>
			</div>
			<div class="form-group row">
				<label for="golongan" class="col-sm-2 col-form-label" style="text-align: right;">Golongan</label><br>
				<select class="custom-select" id="inputGroupSelect02" name="golongan" placeholder="Golongan" style="width: 550px" required>
					<option selected>Pilih Golongan</option>
				    <option value="A/4">A/4</option>
				    <option value="I/1">I/1</option>
				    <option value="I/2">I/2</option>
				    <option value="I/3">I/3</option>
				    <option value="I/4">I/4</option>
				    <option value="II/1">II/1</option>
				    <option value="II/2">II/2</option>
				    <option value="II/3">II/3</option>
				    <option value="II/4">II/4</option>
				    <option value="III/1">III/1</option>
				    <option value="III/2">III/2</option>
				    <option value="III/3">III/3</option>
				    <option value="III/4">III/4</option>
				    <option value="IV/1">IV/1</option>
				</select>
			</div>
			<div class="form-group row">
				<label for="jabatan" class="col-sm-2 col-form-label" style="text-align: right;">Jabatan</label>
				<input type="text" class="form-control" name="jabatan" placeholder="Jabatan" style="width: 550px"required>
			</div>
			<div class="form-group row">
				<label for="gaji_pokok" class="col-sm-2 col-form-label" style="text-align: right;">Gaji Pokok</label>
				<input type="text" class="form-control" name="gaji_pokok" placeholder="Gaji Pokok" style="width: 550px" required>
			</div>
			<div class="form-group row">
				<label for="tunjangan" class="col-sm-2 col-form-label" style="text-align: right;">Tunjangan</label>
				<input type="text" class="form-control" name="tunjangan" placeholder="Tunjangan" style="width: 550px" required>
			</div>
			<button type="submit" class="btn btn-light"><img src="image/create.png" width="25px">&nbsp;&nbsp;<b>Buat</b></button>
		</form>
		<hr color="#ff6600" style="width: 550px">
	</center>
