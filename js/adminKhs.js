// KHS MODAL LIHAT
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
// KHS MODAL LIHAT END

// KHS MODAL UPLOAD 
$(".edit-nilai").click(function () {
  var id_mahasiswa = $(this).attr("data-mhs");
  var id_semester = $(this).attr("data-semester");
  
  $.ajax({
    url: "../process/proses_khs.php",
    method: "post",
    data: {
      editNilaimhs: id_mahasiswa,
      editNilaiSemester: id_semester
    },
    success: function (data) {
      $("#input-Mhs").html(data);
      $("#myModal").modal("show");
    }
  });
});
// KHS MODAL UPLOAD END

// KHS MODAL UPLOAD 
$(".update-nilai").click(function () {
  var id_mahasiswa = $(this).attr("data-mhs");
  var id_semester = $(this).attr("data-semester");
  
  $.ajax({
    url: "../process/proses_khs.php",
    method: "post",
    data: {
      updateNilaiMhs: id_mahasiswa,
      updateNilaiSemester: id_semester
    },
    success: function (data) {
      $("#update-Mhs").html(data);
      $("#updateModal").modal("show");
    }
  });
});
// KHS MODAL UPLOAD END