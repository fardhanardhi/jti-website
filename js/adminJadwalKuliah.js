$(".hapus-jadwal-kuliah").click(function () {
  var id_kelas = $(this).attr("id");
  var id_semester = $(this).attr("attrSemester");
  $("#id_kelasHapus").val(id_kelas);
  $("#id_semesterHapus").val(id_semester);
  $("#hapus").modal("show");
});

$("#txtCariJadwalKuliah").keyup(function () {
  var input,
    filter,
    itemJadwalKuliah,
    kelas,
    nama,
    semester,
    jumlah_matkul,
    jumlah_sks,
    i,
    txtValueKelas,
    txtValueNama,
    txtValueSemester,
    txtValueJumlahMatkul,
    txtValueJumlahSks,
    totalInactive,
    input = $("#txtCariJadwalKuliah");
  filter = $(input)
    .val()
    .toUpperCase();

  itemJadwalKuliah = $("#dataJadwalKuliah .itemJadwalKuliah");
  for (i = 0; i < itemJadwalKuliah.length; i++) {
    kelas = $(itemJadwalKuliah[i]).find(".kelas");
    nama = $(itemJadwalKuliah[i]).find(".nama");
    semester = $(itemJadwalKuliah[i]).find(".semester");
    jumlah_matkul = $(itemJadwalKuliah[i]).find(".jumlah_matkul");
    jumlah_sks = $(itemJadwalKuliah[i]).find(".jumlah_sks");
    if (kelas || nama || semester || jumlah_matkul || jumlah_sks) {
      txtValueKelas = $(kelas)
        .text()
        .toUpperCase();
      txtValueNama = $(nama)
        .text()
        .toUpperCase();
      txtValueSemester = $(semester)
        .text()
        .toUpperCase();
      txtValueJumlahMatkul = $(jumlah_matkul)
        .text()
        .toUpperCase();
      txtValueJumlahSks = $(jumlah_sks)
        .text()
        .toUpperCase();
      if (
        txtValueKelas.indexOf(filter) > -1 ||
        txtValueNama.indexOf(filter) > -1 ||
        txtValueSemester.indexOf(filter) > -1 ||
        txtValueJumlahMatkul.indexOf(filter) > -1 ||
        txtValueJumlahSks.indexOf(filter) > -1
      ) {
        itemJadwalKuliah[i].style.display = "";
      } else {
        itemJadwalKuliah[i].style.display = "none";
      }
    }
  }

  totalInactive = $("#dataJadwalKuliah .itemJadwalKuliah:hidden");

  if (itemJadwalKuliah.length == totalInactive.length) {
    document.getElementById("tidakDitemukan").style.display = "block";
  } else {
    document.getElementById("tidakDitemukan").style.display = "none";
  }
});

$(".tampil-detail").click(function () {
  var id_kelas = $(this).attr("data-kelas");
  var id_semester = $(this).attr("data-semester");

  $.ajax({
    url: "../process/proses_adminJadwalKuliah.php",
    method: "post",
    data: {
      tampilDetailKelas: id_kelas,
      tampilDetailSemester: id_semester
    },
    success: function (data) {
      $("#detail-jadwalKuliah").html(data);
      $("#modalPreview").modal("show");
    }
  });
});