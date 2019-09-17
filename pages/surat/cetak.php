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

<style>
  #table1 {
      border-collapse: separate;
  }

  #table2 {
      border-collapse: collapse;
      border: 1px solid black;
  }
</style>

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
    <table style="font-size:110%;">
      <tr>
        <td>Telepon</td>
        <td>:</td>
        <td>022-7208310</td>
      </tr>
      <tr>
        <td>Kawat</td>
        <td>:</td>
        <td>Perumhutkph</td>
      </tr>
      <tr>
        <td>Fax</td>
        <td>:</td>
        <td>022-7231239</td>
      </tr>
    </table>
    <hr>
    <p align="center" style="font-size:120%;"><b><ins>SURAT PERINTAH PERJALANAN DINAS</ins><br>NOMOR : <?= $data['no'] ?>/SPPD/BDS/DivreJanten/2018</b></p>

<table border="0" align="center" style="font-size:110%;">
  <tr>
    <td style="width: 15px">1.</td>
    <td style="width: 210px">Perintah</td>
    <td>:</td>
    <td style="width: 300px"><?= $data['perintah'] ?></td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Yang diperintahkan</td>
    <td>:</td>
    <td><b><?= $data['nama_lengkap'] ?></b></td>
  </tr>
  <tr>
    <td>3.</td>
    <td>a. Pangkat & golongan</td>
    <td>:</td>
    <td><?= $data['golongan'] ?></td>
  </tr>
  <tr>
    <td></td>
    <td>b. Jabatan</td>
    <td>:</td>
    <td><?= $data['jabatan'] ?></td>
  </tr>
  <tr>
    <td></td>
    <td>c. Gaji pokok</td>
    <td>:</td>
    <td><?php echo "Rp. "; ?><?= number_format($data['gaji_pokok']) ?></td>
  </tr>
  <tr>
    <td></td>
    <td>d. Tingkat menurut peraturan</td>
    <td>:</td>
    <td>-</td>
  </tr>
  <tr>
    <td>4.</td>
    <td>Maksud perjalanan dinas</td>
    <td>:</td>
    <td><?= $data['maksud'] ?></td>
  </tr>
  <tr>
    <td>5.</td>
    <td>Alat angkut yang dipergunakan</td>
    <td>:</td>
    <td><?= $data['kendaraan'] ?></td>
  </tr>
  <tr>
    <td>6.</td>
    <td>a. Tempat berangkat</td>
    <td>:</td>
    <td><?= $data['tempat_berangkat'] ?></td>
  </tr>
  <tr>
    <td></td>
    <td>b. Tempat tujuan</td>
    <td>:</td>
    <td><?= $data['tempat_tujuan'] ?></td>
  </tr>
  <tr>
    <td>7.</td>
    <td>a. Lama perjalanan</td>
    <td>:</td>
    <td><?php
            $berangkat = new DateTime($data['tgl_berangkat']);
            $kembali = new DateTime($data['tgl_kembali']);
            $lama = $kembali->diff($berangkat)->format("%a");
            echo $lama + 1;
          ?> Hari</td>
  </tr>
  <tr>
    <td></td>
    <td>b. Tanggal berangkat</td>
    <td>:</td>
    <td><?= $data['tgl_berangkat'] ?></td>
  </tr>
  <tr>
    <td></td>
    <td>c. Tanggal harus kembali</td>
    <td>:</td>
    <td><?= $data['tgl_kembali'] ?></td>
  </tr>
  <tr>
    <td>8.</td>
    <td>Pembebanan angkutan</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td>a. Bagian</td>
    <td>:</td>
    <td>Makan + Transportasi</td>
  </tr>
  <tr>
    <td></td>
    <td>b. Biaya</td>
    <td>:</td>
    <td>
      <?php
        $berangkat = new DateTime($data['tgl_berangkat']);
        $kembali = new DateTime($data['tgl_kembali']);
        $lama = $kembali->diff($berangkat)->format("%a") + 1;

        //Uang makan
        echo "Rp. ";
        $uangMakan = $data['golongan'];
          if ($uangMakan == 'A/4') {
              // 30000/sekali makan - Sehari/2 kali makan
              $biayaUangMakan = 60000 * $lama;
              echo number_format($biayaUangMakan);
                }
                else{
                  // 35000/sekali makan - Sehari/2 kali makan
                  $biayaUangMakan = 70000 * $lama;
              echo number_format($biayaUangMakan);
                }

              //Biaya transportasi
              echo " + Rp. ";
              $transportasi = $data['kendaraan'];
                if ($transportasi == 'Kendaraan Dinas') {
                $biayaTransportasi = 0 * $lama;
                echo number_format($biayaTransportasi);
              }elseif ($transportasi == 'Kendaraan Non Dinas') {
                $biayaTransportasi = 40000 * $lama;
                echo number_format($biayaTransportasi);
              }else{}

              echo " = Rp. ";
              $totalBiayaPerjalanan = $biayaUangMakan + $biayaTransportasi;
              echo number_format($totalBiayaPerjalanan);
      ?>
    </td>
  </tr>
  
  <tr>
    <td>9</td>
    <td>Keterangan</td>
    <td>:</td>
    <td><?= $data['keterangan'] ?></td>
  </tr>
</table>

<br><br><br>

<table border="" align="center" style="font-size:110%;">
  <tr>
    <td style="width: 150px"></td>
    <td style="width: 250px"></td>
    <td style="width: 150px">Dikeluarkan di Bandung</td>
  </tr>
  <tr>
    <td style="width: 150px"></td>
    <td style="width: 250px"></td>
    <td style="width: 150px">Pada tanggal <?= $data['tgl_buat'] ?></td>
  </tr>
  <tr>
    <td style="width: 150px">Yang diberi perintah</td>
    <td style="width: 250px"></td>
    <td style="width: 150px">Yang memberi perintah</td>
  </tr>
  <tr>
    <td></td>
    <td style="height: 100px"></td>
    <td></td>
  </tr>
  <tr>
    <td><?= $data['nama_lengkap'] ?></td>
    <td></td>
    <td><?= $data['perintah'] ?></td>
  </tr>
  <tr>
    <td>NPK. <?= $data['nip'] ?></td>
    <td></td>
    <td>NPK.
      
      <?php
        $perintah = $data['perintah'];
        if ($perintah == 'ASEP SURAHMAN') {
          echo '19621125199206100';
        }
        elseif ($perintah == 'HENDRAWAN NUGRAHA'){
          echo '19720523199704100';
        }
        else{
          echo '19791122200608100';
        }
      ?>
      

    <!--
      <?php
        $perintah = new Surat($data['perintah']);

        switch ($perintah) {
            case "ASEP SURAHMAN":
                echo "19621125199206100";
                break;
            case "HENDRAWAN NUGRAHA":
                echo "19720523199704100";
                break;
            case "FARID MARUF":
                echo "19791122200608100";
                break;        
        }
      ?>
      -->

    </td>
  </tr>
</table>

<page orientation="p"> <!-- Halaman ke-2 -->
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
    <hr>
  <p align="center" style="font-size:120%;"><b><ins>SURAT PERINTAH PERJALANAN DINAS</ins><br>NOMOR : <?= $data['no'] ?>/SPPD/BDS/DivreJanten/2018</b></p>

  <table align="center" border="1" style="border-collapse: collapse;">
    <tr>
      <td>I.<br><br><br><br><br><br><br><br></td>
      <td width="135"></td>
      <td width="135"></td>
      <td width="140">&nbsp;Berangkat dari<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td width="140">&nbsp;<?= $data['tempat_berangkat'] ?><br>&nbsp;<?= $data['tgl_berangkat'] ?><br>&nbsp;....................................<br><br><br><br><br>&nbsp;(<?= $data['perintah'] ?>)</td>
    </tr>
    <tr>
      <td>II.<br><br><br><br><br><br><br><br></td>
      <td>&nbsp;Tiba di<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br><br></td>
      <td>&nbsp;Berangkat dari<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br>&nbsp;(..................................)</td>
    </tr>
    <tr>
      <td>III.<br><br><br><br><br><br><br><br></td>
      <td>&nbsp;Tiba di<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br><br></td>
      <td>&nbsp;Berangkat dari<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br>&nbsp;(..................................)</td>
    </tr>
    <tr>
      <td>IV.<br><br><br><br><br><br><br><br></td>
      <td>&nbsp;Tiba di<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br><br></td>
      <td>&nbsp;Berangkat dari<br>&nbsp;Pada tanggal<br>&nbsp;Kepala<br><br><br><br><br><br></td>
      <td>&nbsp;....................................<br>&nbsp;....................................<br>&nbsp;....................................<br><br><br><br><br>&nbsp;(..................................)</td>
    </tr>
    <tr>
      <td>V.<br><br><br><br><br><br><br><br><br></td>
      <td colspan="2">&nbsp;Tiba kembali di <?= $data['tempat_berangkat'] ?><br><br><br>&nbsp;Pejabat yang memberi perintah<br><br><br><br><br>&nbsp;(<?= $data['perintah'] ?>)</td>
      <td colspan="2">&nbsp;Telah diperiksa dengan keterangan<br>&nbsp;bahwa perjalanan tersebut benar<br>&nbsp;dilakukan atas perintah<br>&nbsp;Pejabat yang memberi perintah<br><br><br><br><br>&nbsp;(<?= $data['perintah'] ?>)</td>
    </tr>
    <tr>
      <td>VI.<br><br></td>
      <td colspan="2">&nbsp;Catatan lain-lain<br><br></td>
      <td colspan="2"><br><br></td>
    </tr>
    <tr>
      <td>VII.</td>
      <td colspan="4">&nbsp;Check List</td>
    </tr>
    <tr>
      <td rowspan="5"></td>
      <td colspan="2">&nbsp;Tiket :</td>
      <td colspan="2">&nbsp;Ok/Tidak Ok</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;Tiket :</td>
      <td colspan="2">&nbsp;Ok/Tidak Ok</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;Tiket :</td>
      <td colspan="2">&nbsp;Ok/Tidak Ok</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;Tiket :</td>
      <td colspan="2">&nbsp;Ok/Tidak Ok</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;Tiket :</td>
      <td colspan="2">&nbsp;Ok/Tidak Ok</td>
    </tr>
  </table>
</page>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename=$data['no']."-SPPD-BDS-DivreJanten-2018".".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
 require_once('/../../controllers/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(20, 20, 20, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->pdf->SetTitle('SPPD');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  ob_end_clean();
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>