// $(".tampil-detail").click(function() {
//     var id_mahasiswa = $(this).attr("id");

//     $.ajax({
//       url: "../process/proses_khs.php",
//       method: "post",
//       data: { nm_mahasiswa: id_mahasiswa },
//       success: function(data) {
//         $("#id_mahasiswa").val(id_mahasiswa);
//         $("#detail-nilaiMhs").html(data);
//         $("#myModal").modal("show");
//       }
//     });
//   });

  $(".tampil-detail").click(function () {
    var id_mahasiswa = $(this).attr("data-mhs");
    var id_semester = $(this).attr("data-semester");
  
    $.ajax({
      url: "../process/proses_khs.php",
      method: "post",
      data: {
        tampilDetailMhs: id_mahasiswa,
        tampilDetailSemester: id_semester
      },
      success: function (data) {
        $("#detail-nilaiMhs").html(data);
        $("#myModal").modal("show");
      }
    });
  });