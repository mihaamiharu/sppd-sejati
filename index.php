<?php
	session_start();

	if (empty($_SESSION)) {
		session_destroy();
		header('location: login.php');
	}

	//Bila tidak login maka dialihkan ke menu login
	if(!isset($_SESSION['username']))
	{
		header('location: login.php');
		exit();
	}
?>

<html>
	<head>
		<title>SPPD Apps</title>

		<link href='image/perhutani-logo.png' rel='shortcut icon'>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
		<script src="bootstrap/js/bootstrap/jquery.min.js> </script>
		<script src="bootstrap/js/bootstrap.js"> </script>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">



	</head>

	<style>
		#primary-nav {
  			background-color: white;
		}
	</style>

	<body style="background-color: #f2f2f2;">
		<?php
			//Cek halaman yang dituju
			array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page = 'home';
		?>

		<!-- Menu halaman utama -->
		<div style="background-color: #ff6600;">
			<div class="container text-center">
				<center>
				<!--
				<h4 style="font-family:Montserrat; color: #f2f2f2"><br>
					<img src="image/letter.png" width="30px">&nbsp;&nbsp;&nbsp;
					<b>SPPD</b> Apps&nbsp;&nbsp;&nbsp;
					<img src="image/employee.png" width="30px">
				</h4>

				<h6 style="color: #f2f2f2">Perum Perhutani Divisi Regional Jawa Barat & Banten<br>KPH Bandung Selatan</h6>
				-->
				<table>
					<tr style="height: 10px"></tr>
					<tr>
						<th>
							<h2>
								<img src="image/sppd-header-1.png" height="40px">
							</h2>
						</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
						<th>
								<h6 style="font-family:Montserrat; color: #f2f2f2"><br><b>
									Perum Perhutani Divisi Regional Jawa Barat & Banten KPH Bandung Selatan<br><br></b>
								</h6>
						</th>
					</tr>
				</table>
				</table>
				</center>
			</div>
		</div>
		
		<div id="primary-nav">
		  	<div class="container">
		    	<ul class="nav nav-tabs nav-pills nav-fill" style="font-family:Ubuntu; color: black;">
		    		<!-- Home -->
			      	<li class="nav-item <?php if(!$page || $page=='home') echo 'active'; ?>">
			        	<a href="index.php?page=home" class="nav-link" style="color: #ff6600"><b>Home</b></a>
			      	</li>
			      	<li class="nav-item">
	        			<a class="nav-link disabled"><b>|</b></a>
	      			</li>
	      			<!-- Data Pegawai -->
			      	<li class="nav-item <?php if($page=='pegawai') echo 'active'; ?>">
			        	<a href="index.php?page=pegawai" class="nav-link" style="color: #ff6600"><b>Data Pegawai</b></a>
			      	</li>
			      	<li class="nav-item <?php if($page=='pegawai-create') echo 'active'; ?>">
			        	<a href="index.php?page=pegawai-create" class="nav-link" title="Tambah Data Pegawai" style="color: #ff6600"><img src="image/create-pegawai.png" width="20px"><b>&nbsp;&nbsp;Pegawai</b></a>
			      	</li>
			      	<li class="nav-item">
	        			<a class="nav-link disabled"><b>|</b></a>
	      			</li>
	      			<!-- Surat -->
			      	<li class="nav-item <?php if($page=='surat') echo 'active'; ?>">
			        	<a href="index.php?page=surat" class="nav-link" style="color: #ff6600"><b>Data SPPD</b></a>
			      	</li>
			      	<li class="nav-item <?php if($page=='surat-create') echo 'active'; ?>">
			        	<a href="index.php?page=surat-create" class="nav-link" title="Buat SPPD" style="color: #ff6600"><img src="image/create-surat.png" width="20px"><b>&nbsp;&nbsp;SPPD</b></a>
			      	</li>
			      	<li class="nav-item">
	        			<a class="nav-link disabled"><b>|</b></a>
	      			</li>
	      			<!-- Logout -->
	      			<li class="nav-item">
	      				<a class="nav-link disabled"><img src="image/user-1.png" width="25px">&nbsp;&nbsp;<b><?php echo $_SESSION['nama']; ?></b></a>
	      			</li>
			      	<li class="nav-item">
			      		<a href="controllers/login/cekLogout.php" class="nav-link" title="Keluar" style="color: red"><b>Keluar</b>&nbsp;<img src="image/logout-2.png" width="25px"></a>
			      	</li>
		    	</ul>    
		  	</div>
		</div>



		<?php
			if($page=="home") {
				include "pages/home.php";
			}
		?>

		<!-- Konten -->
		<div class="container">
			<?php
				//redirect ke halaman data pegawai
				if ($page=="pegawai") {
					include "pages/pegawai/data.php";
				}

				//redirect ke halaman detail pegawai
				if ($page=="pegawai-detail") {
					include "pages/pegawai/detail.php";
				}

				//redirect ke halaman detail pegawai
				if ($page=="pegawai-update") {
					include "pages/pegawai/update.php";
				}

				//redirect ke halaman create pegawai
				if ($page=="pegawai-create") {
					include "pages/pegawai/create.php";
				}

				//redirect ke halaman data surat
				if ($page=="surat") {
					include "pages/surat/data.php";
				}

				//redirect ke halaman detail surat
				if ($page=="surat-detail") {
					include "pages/surat/detail.php";
				}

				//redirect ke halaman create surat
				if ($page=="surat-create") {
					include "pages/surat/create.php";
				}

				//redirect ke halaman cetak sppd
				if ($page=="surat-cetak") {
					include "pages/surat/cetak.php";
				}

				//redirect ke halaman cetak nota dinas
				if ($page=="surat-cetak-nota") {
					include "pages/surat/cetak-nota.php";
				}

				//redirect ke halaman cetak kwitansi sppd
				if ($page=="surat-cetak-kwitansi") {
					include "pages/surat/cetak-kwitansi.php";
				}
			?>
		</div>
		<p style="text-align:center; font-size:14px; font-family:Ubuntu;"><b>Sejati Muhammad W S © 2019</b></p>
		<p style="text-align:center; font-size:10px; font-family:Ubuntu; color: red">
		<?php
		    $time_start = microtime(true);
		    sleep(1);
		    $time_end = microtime(true);
		    $time = $time_end - $time_start;
		    echo "Process Time: {$time}";
		?>
		</p>
	</body>
</html>