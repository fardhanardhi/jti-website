$(".hapus-jadwal-kuliah").click(function() {
  var id_kelas = $(this).attr("id");
  var id_semester = $(this).attr("attrSemester");
  $("#id_kelasHapus").val(id_kelas);
  $("#id_semesterHapus").val(id_semester);
  $("#hapus").modal("show");
});

$("#txtCariJadwalKuliah").keyup(function() {
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
    halamanTidakDitemukan = document.getElementById("tidakDitemukan"),
    tabelJadwalKuliah = document.getElementById("dataJadwalKuliah");
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
        tabelJadwalKuliah.style.display = "block";
        halamanTidakDitemukan.style.display = "none";
      } else {
        tabelJadwalKuliah.style.display = "none";
        halamanTidakDitemukan.style.display = "block";
      }
    }
  }
});
