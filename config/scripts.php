  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

  <!-- bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

  <!-- lightbox (preview gambar) -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

  <!-- chartjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script src="../js/script.js"></script>
  <script src="../js/modalPengaturan.js"></script>
  <script src="../js/dosenScript.js"></script>
  <script src="../js/dataMahasiswaAdmin.js"></script>
  <script src="../js/dataDosenAdmin.js"></script>
  <script src="../js/adminScript.js"></script>
  <script src="../js/adminBeasiswa.js"></script>
  <script src="../js/adminBerita.js"></script>
  <script src="../js/adminKrs.js"></script>
  <script src="../js/adminKhs.js"></script>
  <script src="../js/adminJadwalKuliah.js"></script>
  <script src="../js/mahasiswaKelasKosong.js"></script>
  <?php
  if ($level == "admin") {
    ?>
    <script src="../js/adminEComplain.js"></script>
    <script src="../js/adminRuangan.js"></script>
    <script src="../js/adminKuisioner.js"></script>
    <script src="../js/adminAbsenKompen.js"></script>
  <?php
}
?>