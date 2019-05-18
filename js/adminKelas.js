$("#cariKelas").click(function() {
    var cari = $("#kelasCari option:selected").val();
  
    $.ajax({
      url: "../process/proses_kelas.php",
      method: "post",
      data: 
      {
        cariKelas: cari
      },
      success: function(data) {
        $("#mencariKelas").html(data);
      }
    });
  });