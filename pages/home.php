<?php
  $path = "/../class/Surat.php";
  include $path;
  $surat = new Surat();
?>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Filtering data dengan jQuery-->
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#notif div").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
  });
</script>

    <table class="mt-3 ml-5">
      <tr>
        <th><input id="myInput" class="form-control" style="font-family:Ubuntu; width: 240px"type="text" placeholder="Temukan disini..."></th>
        <!-- <th>
          <div class="alert alert-light mt-3 ml-5 mr-5" role="alert" style="font-family:Ubuntu;"><img src="image/money-bag.png" width="25px">&nbsp;&nbsp;
            Anggaran yang telah digunakan
          </div> -->
        </th>
      </tr>
    </table> 

<div id="notif">
  <?php foreach($surat->getAktif() as $notif) : ?>
    
  <?php
    $nama_lengkap = $notif['nama_lengkap'];
    $nama = $_SESSION['nama'];
    $tgl_berangkat = $notif['tgl_berangkat'];
    $tgl_kembali = $notif['tgl_kembali'];
    $tempat_tujuan = $notif['tempat_tujuan'];
    $no = $notif['no'];

      if (strtotime(date('Y-m-d')) <= strtotime($notif['tgl_kembali'])) {
        if (strtotime($notif['tgl_berangkat']) <= strtotime(date('Y-m-d'))) {
          echo '<div class="alert alert-primary mt-3 ml-5 mr-5" role="alert" style="font-family:Ubuntu;"><img src="image/notification.png" width="25px">&nbsp;&nbsp;&nbsp; Hai ' . $nama .  ', ' . '<a class="alert-link" href="index.php?page=surat-detail&no=' . $no . '">' . $nama_lengkap .  '</a>' . ' sedang melakukan perjalanan dinas sampai dengan tanggal ' . $tgl_kembali . ' di ' . $tempat_tujuan . '</div>';
        }elseif (strtotime(date('Y-m-d')) <= strtotime($notif['tgl_berangkat'])){
          echo '<div class="alert alert-warning mt-3 ml-5 mr-5" role="alert" style="font-family:Ubuntu;"><img src="image/notification.png" width="25px">&nbsp;&nbsp;&nbsp; Hai ' . $nama .', ' . '<a class="alert-link" href="index.php?page=surat-detail&no=' . $no . '">' . $nama_lengkap .  '</a>' . ' akan melakukan perjalanan dinas mulai dari tanggal ' . $tgl_berangkat .  ' ke ' . $tempat_tujuan . '</div>';
        }
      }else{
      }
    ?>
  <?php endforeach; ?>
</div>
<br>
<hr color="#ff6600" id="bottom">