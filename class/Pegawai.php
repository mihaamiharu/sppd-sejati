<?php
	if (!class_exists('Database')){
		require('Database.php');
	}

	class Pegawai {
		//menambah atribut pegawai
		public $nip;
		public $nama_lengkap;
		public $jenjang;
		public $golongan;
		public $jabatan;
		public $gaji_pokok;
		public $tunjangan;
		public $gaji_total;

		//method untuk menampilkan semua data pegawai
		public function getData() {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM pegawai";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
		}

		//method untuk menampilkan data pegawai berdasarkan nip
		public function getDetail($nip) {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM pegawai WHERE nip = '{$nip}'";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
		}

		//method untuk membuat data pegawai
		public function create() {
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			//query untuk menyimpan data
			$sql = "INSERT INTO pegawai
					(
						nip,
						nama_lengkap,
						jenjang,
						golongan,
						jabatan,
						gaji_pokok,
						tunjangan
					)
					VALUES
					(
						'{$this->nip}',
						'{$this->nama_lengkap}',
						'{$this->jenjang}',
						'{$this->golongan}',
						'{$this->jabatan}',
						'{$this->gaji_pokok}',
						'{$this->tunjangan}'
					)";
			//eksekusi query diatas
			$data = $dbConnect->query($sql);
			//menampung error query simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			//mengembalikan nilai error
			return $error;
		}

		public function update() {
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			
			//query menyimpan data 
			$sql = "UPDATE pegawai SET
					nama_lengkap='{$this->nama_lengkap}',
					jenjang='{$this->jenjang}',
					golongan='{$this->golongan}',
					jabatan='{$this->jabatan}',
					gaji_pokok='{$this->gaji_pokok}',
					tunjangan='{$this->tunjangan}'
					WHERE nip='{$this->nip}'
					";
			//eksekusi query di atas
			$data = $dbConnect->query($sql);
			//menampung error simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			//mengembalikan nilai error
			return $error;
		}

		public function delete(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "DELETE FROM pegawai 
					WHERE nip = '{$this->nip}'";
			$data = $dbConnect->query($sql);
			$error = $dbConnect->error;
			$dbConnect = $db->close();
			return $error;
		}		
	}
?>