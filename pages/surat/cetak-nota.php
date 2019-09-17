<?php
    ob_start();
    $path = "/../../class/Surat.php";
    include $path;
    $surat = new Surat();
    $data = null;
    if(isset($_GET['no'])){
      $data = $surat->getDetail($_GET['no']);
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
</head>
  <body>
    <table>
      <tr>
        <th><br><img src="image/logoperhutani.png" width="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
          <p align="center" style="font-size:125%;"><b>
            PERUM PERHUTANI<br>
            (PERUSAHAAN UMUM KEHUTANAN NEGARA)<br>
            DIVISI REGIONAL JAWA BARAT DAN BANTEN<br>
            KESATUAN PEMANGKUAN HUTAN BANDUNG SELATAN</b>
          </p>
        </th>
      </tr>
    </table>
    <p align="center" style="font-size:110%;">
      Alamat : Jalan Cirebon No. 4 Bandung
    </p>

<h4 align="center">
	<b>NOTA DINAS</b>
</h4>

<table border="" style="font-size:110%;">
	<tr>
        <td>Perihal : </td>
        <td>Permohonan untuk melakukan</td>
        <td style="width: 180px"></td>
        <td>Bandung, <?= $data['tgl_buat'] ?></td>
    </tr>
	<tr>
        <td></td>
        <td> perjalanan dinas</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Kepada : </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Yth. Adm. Perhutani/KPPH</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Bandung Selatan di Bandung</td>
    </tr>
</table>
<br>
<p style="font-size:110%;">
	Dengan Hormat,
</p>
<p style="font-size:110%;">
	Dimohon persetujuannya Bapak/Ibu atas penugasan untuk melakukan perjalanan dinas kepada :
</p>

<table style="font-size:110%;">
	<tr>
		<td style="width: 40px"></td>
		<td>Nama</td>
		<td>:</td>
		<td><?= $data['nama_lengkap'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>Jabatan</td>
		<td>:</td>
		<td><?= $data['jabatan'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>Pangkat/Golongan</td>
		<td>:</td>
		<td><?= $data['golongan'] ?></td>
	</tr>
</table>

<p style="font-size:110%;">
	Dengan rincian perjalanan sebagai berikut :
</p>

<table style="font-size:110%;">
	<tr>
		<td style="width: 40px"></td>
		<td>Berangkat</td>
		<td>:</td>
		<td><?= $data['tgl_berangkat'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>Kembali</td>
		<td>:</td>
		<td><?= $data['tgl_kembali'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>Banyaknya hari</td>
		<td>:</td>
		<td>
			<?php
            $berangkat = new DateTime($data['tgl_berangkat']);
            $kembali = new DateTime($data['tgl_kembali']);
            $lama = $kembali->diff($berangkat)->format("%a");
            echo $lama + 1;
          	?>
          	Hari
		</td>
	</tr>
	<tr>
		<td></td>
		<td>Kendaraan</td>
		<td>:</td>
		<td><?= $data['kendaraan'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td>Maksud perjalanan</td>
		<td>:</td>
		<td><?= $data['maksud'] ?></td>
	</tr>
</table>

<br><br><br>

<table align="right" style="font-size:110%;">
  <tr>
    <td>Kasi PBB</td>
  </tr>
  <tr>
    <td height="100"></td>
  </tr>
  <tr>
    <td><ins>DEDE NUGRAHA, S.HUT.</ins><br>PHT19660123199609100</td>
  </tr>
</table>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename=$data['no']."-Nota Dinas".".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
 require_once('/../../controllers/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 20, 20, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->pdf->SetTitle('Nota Dinas');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  ob_end_clean();
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>