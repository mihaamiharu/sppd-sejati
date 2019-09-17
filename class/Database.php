<?php
	class Database {

		private $conn;

		//method untuk menghubungkan ke database
		public function connect() {
			$this->conn = new mysqli("localhost", "root", "", "sppd");
			return $this->conn;
		}

		//method untuk memutuskan koneksi dengan database
		public function close() {
			return $this->conn->close();
		}
	}
?>