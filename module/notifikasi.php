<?php
include "../config/connection.php";
include "../process/proses_notifikasi.php";
?>

<!-- momentjs -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>


<main role="main" class="container-fluid">
  <?php
    $result = notifikasi($con, $idUser);
    if(mysqli_num_rows($result) == 0) {
  ?>
  <!-- Notifikasi kosong -->
  <div class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 p-4 bg-white shadow-sm rounded">
          <h5 class="border-bottom border-gray py-2">Pemberitahuan Anda</h5>
          <div class="mt-5 mb-3 w-100 d-flex flex-column align-items-center">
            <span class="far fa-bell fa-5x text-secondary"></span>
            <p class="mt-3">
              Tidak ada notifikasi yang tersedia
            </p>
          </div>
      </div>
    </div>
  </div>
  <?php
    } else {
  ?>

  <!-- Notifikasi -->
  <div class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 p-4 bg-white shadow-sm rounded">
          <h5 class="border-bottom border-gray py-2">Pemberitahuan Anda</h5>
          <div class="mt-3 px-3 w-100 d-flex flex-column align-items-center">
            <table class="table table-sm small table-hover">
              <?php
                while($row=mysqli_fetch_assoc($result)) {
              ?>
              <tr class='baca-notifikasi' data-href='../process/proses_notifikasi.php?module=notifikasi&act=baca&id=<?=$row['id_notifikasi']?>'>
                <?php
                  if ($row['status_dibaca'] == 'belum') {
                ?>
                <td class="d-flex px-3 table-secondary">
                <?php
                  } else {
                ?>
                <td class="d-flex px-3">
                <?php
                  }
                ?>
                  <?=$row['isi']?>
                  <span class="ml-auto">
                    <script>
                      var m = moment('<?=$row['waktu']?>', 'YYYY-MM-DD HH:mm:ss').fromNow()
                      document.write(m)
                    </script>
                  </span>
                </td>
              </tr>
              <?php
                }
              ?>
            </table>
          </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
</main>

