$("#cariKelasKosongAdmin").click(function() {
  var radioHari = $("input[name='hari']:checked").val(),
    jam = $("#jamKelasKosongAdmin").val();

  $.ajax({
    url: "../process/proses_adminRuangan.php",
    method: "post",
    data: { cariKelasKosong: true, hari: radioHari, jam: jam },
    success: function(data) {
      $("#daftar-ruangan").html(data);
    }
  });
});
