$('#cariKhsPerKelas').click(function () {
    $.ajax({
      url: "../process/proses_khs.php",
      method: "post",
      data: { lihatPerKelas: $('#id_kelas').val() },
      success: function (data) {
        $('#tableData').html(data);
        $('#coba').show();
      }
    })
  })