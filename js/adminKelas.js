$("#cariAbsensi").click(function() {
  var kelas = $("#AbsensiCari option:selected").val();

  $.ajax({
    url: "../process/proses_kelas.php",
    method: "post",
    data: {
      cariAbsensi: kelas
    },
    success: function(data) {
      $("#absen").html(data);
    }
  });
});

  // $("#cariKelas").click(function() {
  //   var kelas = $("#AbsensiCari option:selected").val();
  
  //   $.ajax({
  //     url: "../process/proses_kelas.php",
  //     method: "post",
  //     data: {
  //       cariKelas: kelas
  //     },
  //     success: function(data) {
  //       $("#absen").html(data);
  //     }
  //   });
  // });