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
        <table border="">
            <tr>
                <th style="width: 60px"></th>
                <th><br><img src="image/logoperhutani.png" width="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>
                    <p align="center"><b>
                      PERUM PERHUTANI<br>
                      (PERUSAHAAN UMUM KEHUTANAN NEGARA)<br>
                      DIVISI REGIONAL JAWA BARAT DAN BANTEN<br>
                      KESATUAN PEMANGKUAN HUTAN BANDUNG SELATAN</b>
                    </p>
                </th>
            </tr>
        </table>

        <p align="center">
          <b>KWITANSI SPPD</b>
        </p>

        <table>
          <tr>
            <td style="width: 210px">Sub Kegiatan :</td>
            <td style="width: 210px">Bukti Kas No :</td>
            <td style="width: 210px">Tahun Anggaran : 2018</td>
          </tr>
        </table>
        <br>
        <table border="">
          <tr>
            <td style="width: 210px">Sudah diterima dari</td>
            <td>:</td>
            <td>Perum Perhutani KPH Bandung Selatan</td>
          </tr>
          <tr>
            <td>Uang sebesar</td>
            <td>:</td>
            <td>
              <?php
                $berangkat = new DateTime($data['tgl_berangkat']);
                $kembali = new DateTime($data['tgl_kembali']);
                $lama = $kembali->diff($berangkat)->format("%a") + 1;

                //Uang makan
                $uangMakan = $data['golongan'];
                  if ($uangMakan == 'A/4') {
                      // 30000/sekali makan - Sehari/2 kali makan
                      $biayaUangMakan = 60000 * $lama;
                        number_format($biayaUangMakan);
                        }
                        else{
                          // 35000/sekali makan - Sehari/2 kali makan
                          $biayaUangMakan = 70000 * $lama;
                        number_format($biayaUangMakan);
                        }

                      //Biaya transportasi
                      $transportasi = $data['kendaraan'];
                        if ($transportasi == 'Kendaraan Dinas') {
                        $biayaTransportasi = 0 * $lama;
                        number_format($biayaTransportasi);
                      }elseif ($transportasi == 'Kendaraan Non Dinas') {
                        $biayaTransportasi = 40000 * $lama;
                        number_format($biayaTransportasi);
                      }else{}

                      echo "Rp. ";
                      $totalBiayaPerjalanan = $biayaUangMakan + $biayaTransportasi;
                      echo number_format($totalBiayaPerjalanan);
              ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Untuk Pembayaran</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Berdasarkan SPPD</td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor</td>
            <td>:</td>
            <td><?= $data['no'] ?>/SPPD/BDS/DivreJanten/2018</td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat Tugas / Tanggal</td>
            <td>:</td>
            <td><?= $data['no'] ?> / <?= $data['tgl_buat'] ?></td>
          </tr>
          <tr>
            <td>Untuk perjalanan dinas dari</td>
            <td>:</td>
            <td><?= $data['tempat_berangkat'] ?> ke <?= $data['tempat_tujuan'] ?></td>
          </tr>
        </table>
        <br><br>
        <table border="" style="border-collapse: collapse;">
          <tr>
            <td style="width: 210px">Lunas dibayar</td>
            <td style="width: 210px">Setuju dibayar</td>
            <td style="width: 210px">Bandung , <?= $data['tgl_buat'] ?></td>
          </tr>
          <tr>
            <td>Bendahara Pengeluaran</td>
            <td>Pejabat yang memerintahkan</td>
            <td>Yang menerima</td>
          </tr>
          <tr>
            <td style="height: 70px"></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td><?= $data['perintah'] ?></td>
            <td><?= $data['nama_lengkap'] ?></td>
          </tr>
          <tr>
            <td>NPK.</td>
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
            </td>
            <td>NPK. <?= $data['nip'] ?></td>
          </tr>
        </table>   
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php

$filename=$data['no']."-Kwitansi SPPD".".pdf"; //nama file pdf

$content = ob_get_clean();
   require_once('/../../controllers/html2pdf/html2pdf.class.php');
   try
   {
    $html2pdf = new HTML2PDF('L','A5','en', false, 'ISO-8859-15',array(17, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->pdf->SetTitle('Kwitansi SPPD');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    ob_end_clean();
    $html2pdf->Output($filename);
   }
   catch(HTML2PDF_exception $e) { echo $e; }
?>