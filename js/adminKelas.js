$("#cariKelas").click(function() {
  var kelas = $("#kelasCari option:selected").val();

  $.ajax({
    url: "../process/proses_kelas.php",
    method: "post",
    data: {
      cariKelas: kelas
    },
    success: function(data) {
      $("#tabelKelas").html(data);
    }
  });
});