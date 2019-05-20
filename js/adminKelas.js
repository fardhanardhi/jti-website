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

//hapus(edit id_kelas)
$(".hapus-jadwal-kuliah").click(function () {
  var id_kelas = $(this).attr("id");
  $("#id_kelasHapus").val(id_kelas);
  $("#hapus").modal("show");
});

//edit 
$(".edit-jadwal-kuliah").click(function () {
  var id_kelas = $(this).attr("data-kelas");
  var id_semester = $(this).attr("data-semester");

  $.ajax({
    url: "../process/proses_adminJadwalKuliah.php",
    method: "post",
    data: {
      editJadwal_kelas: id_kelas,
      editJadwal_semester: id_semester
    },
    success: function (data) {
      $("#id_kelasEdit").val(id_kelas);
      $("#id_semesterEdit").val(id_semester);
      $("#edit-jadwalKuliah").html(data);
      $("#modalEdit").modal("show");
    }
  });
});