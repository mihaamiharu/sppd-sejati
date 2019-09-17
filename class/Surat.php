<?php
	if (!class_exists('Database')){
		require('Database.php');
	}
	
	class Surat	{
		
		public $no;
		public $perintah;
		public $no_pegawai;
		public $maksud;
		public $kendaraan;
		public $tempat_berangkat;
		public $tempat_tujuan;
		public $tgl_buat;
		public $tgl_berangkat;
		public $tgl_kembali;
		public $keterangan;
		public $pembuat;

		public function getData() {
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM surat inner join pegawai on surat.no_pegawai = pegawai.no_pegawai ORDER BY no DESC";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
		}

		public function getDetail($no){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM surat inner join pegawai on surat.no_pegawai = pegawai.no_pegawai where surat.no = '{$no}'";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
		}


		public function create() {
			$db = new Database();
			$dbConnect = $db->Connect();

			$sql = "INSERT INTO surat
					(
						perintah,
						no_pegawai,
						maksud,
						kendaraan,
						tempat_berangkat,
						tempat_tujuan,
						tgl_buat,
						tgl_berangkat,
						tgl_kembali,
						keterangan,
						pembuat
					)
					VALUES
					(
						'{$this->perintah}',
						'{$this->no_pegawai}',
						'{$this->maksud}',
						'{$this->kendaraan}',
						'{$this->tempat_berangkat}',
						'{$this->tempat_tujuan}',
						'{$this->tgl_buat}',
						'{$this->tgl_berangkat}',
						'{$this->tgl_kembali}',
						'{$this->keterangan}',
						'{$this->pembuat}'
					)";
			$data = $dbConnect->query($sql);
			$error = $dbConnect->error;
			$dbConnect = $db->close();
			return $error;
		}

		public function getAktif(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * FROM surat inner join pegawai on surat.no_pegawai = pegawai.no_pegawai WHERE CURDATE() <= tgl_kembali";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
		}
	}
?>