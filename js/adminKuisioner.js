$(document).ready(function() {
  $(".lihat-detail").click(function() {
    var id_dosen = $(this).attr("id");

    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: { namaDosen: id_dosen },
      success: function(data) {
        $("#id_dosen").val(id_dosen);
        $("#judul").html(data);
        $("#modalLihatHasil").modal("show");
      }
    });
  });

  $("#cariKuisionerDosen").click(function() {
    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: {
        id_dosen: $("#id_dosen").val(),
        kelas: $("#kelas").val(),
        tahun: $("#tahun").val(),
        semester: $("#semester").val()
      },
      success: function(data) {
        $("#tableDataKuisionerDosen").html(data);
        $("#modalLihatHasil").modal("show");
      }
    });
  });

  $("#cariKuisionerPerKelas").click(function() {
    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: { lihatPerKelas: $("#id_kelas").val() },
      success: function(data) {
        $("#tableData").html(data);
        $("#modalLihatperKelas").modal("show");
      }
    });
  });

  $("#hentikanKuisioner").click(function() {
    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: { hentikan: $(this).attr("id") },
      success: function() {
        alert("Kuisioner berhasil dihentikan");
        document.location.href = "?module=kuisioner";
      }
    });
  });

  $("#aktifkanKuisioner").click(function() {
    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: { aktifkan: $(this).attr("id") },
      success: function() {
        alert("Kuisioner berhasil diaktifkan");
        document.location.href = "?module=kuisioner";
      }
    });
  });

  $(".modal").on("hidden.bs.modal", function() {
    $("#id_kelas").val(0);
    $("#kelas").val(0);
    $("#tahun").val(0);
    $("#semester").val(0);
    $("#tableData").html(
      "<div class='text-center'><img src='../img/magnifier.svg' alt='pencarian' class='p-3'><p class='text-muted'>Data Tidak Ditemukan</p></div>"
    );
    $("#tableDataKuisionerDosen").html(
      "<div class='text-center'><img src='../img/magnifier.svg' alt='pencarian' class='p-3'><p class='text-muted'>Data Tidak Ditemukan</p></div>"
    );

    $("#formEditKriteria").html(
      "<div class='modal-body'><div class='form-group'><label for='editIsiKriteria'><h5>Isi Kriteria</h5></label><input type='hidden' name='id_kuisioner' id='id_kuisionerEdit'><small class='text-danger ml-3 d-none peringatanEdit' id='peringatanEdit'>*Masukkan Isi Kriteria</small><textarea class='form-control w-100' name='isiKriteria' id='editIsiKriteria' rows='3' oninput='validasiEditKriteria(this)'></textarea></div><div class='pb-2 pt-4 d-flex justify-content-end'><button type='button' class='btn btn-danger mr-4 btn-batal' data-dismiss='modal'>Batal</button><button type='submit' name='editIsi' class='btn btn-success btn-ok'>Update</button></div>"
    );
  });

  $(".edit-kriteria").click(function() {
    var edit_kuisioner = $(this).attr("id");

    $.ajax({
      url: "../process/proses_kuisioner.php",
      method: "post",
      data: { edit_kuisioner: edit_kuisioner },
      success: function(data) {
        $("#id_kuisionerEdit").val(edit_kuisioner);
        $("#editIsiKriteria").val(data);
        $("#modalEditKriteria").modal("show");
      }
    });
  });

  $(".hapus-kriteria").click(function() {
    var id_kuisioner = $(this).attr("id");
    $("#id_kuisionerHapus").val(id_kuisioner);
    $("#modalHapusKriteria").modal("show");
  });
});

// Search kuisioner berdasarkan tahun dan semester
$("#cariKuisioner").click(function() {
  var tahun, semester;
  tahun=$("#tahunKuisioner option:selected").val();
  semester = $("#semesterKuisioner option:selected").val();

  $.ajax({
    url: "../process/proses_kuisioner.php",
    method: "post",
    data: { cariKuisioner: true, tahun: tahun, semester: semester },
    success: function(data) {
      $("#dataDosenKuisioner").html(data);
    }
  });
});

// Search Kuisioner Dosen
$("#txtCariDosenKuisioner").keyup(function() {
  var input,
    filter,
    itemDosenKuisioner,
    nip,
    kelas,
    nama,
    i,
    txtValueNip,
    txtValueNama,
    txtValueKelas,
    totalInactive;
  input = $("#txtCariDosenKuisioner");
  filter = $(input)
    .val()
    .toUpperCase();
  itemDosenKuisioner = $("#dataDosenKuisioner .itemDosenKuisioner");
  for (i = 0; i < itemDosenKuisioner.length; i++) {
    nip = $(itemDosenKuisioner[i]).find(".nip");
    nama = $(itemDosenKuisioner[i]).find(".nama");
    kelas = $(itemDosenKuisioner[i]).find(".kelas");
    if (kelas || nip || nama) {
      txtValueNip = $(nip)
        .text()
        .toUpperCase();
      txtValueNama = $(nama)
        .text()
        .toUpperCase();
      txtValueKelas = $(kelas)
        .text()
        .toUpperCase();
      if (
        txtValueKelas.indexOf(filter) > -1 ||
        txtValueNama.indexOf(filter) > -1 ||
        txtValueNip.indexOf(filter) > -1
      ) {
        itemDosenKuisioner[i].style.display = "";
      } else {
        itemDosenKuisioner[i].style.display = "none";
      }
    }
  }

  totalInactive = $("#dataDosenKuisioner .itemDosenKuisioner:hidden");

  if (itemDosenKuisioner.length == totalInactive.length) {
    document.getElementById("kuisionerTidakDitemukan").style.display = "block";
  } else {
    document.getElementById("kuisionerTidakDitemukan").style.display = "none";
  }
});

// Search Kriteria Kuisioner
$("#txtCariKriteria").keyup(function() {
  var input, filter, itemKriteria, kriteria, i, txtValueKriteria, totalInactive;
  input = $("#txtCariKriteria");
  filter = $(input)
    .val()
    .toUpperCase();
  itemKriteria = $("#dataKriteria .itemKriteria");
  for (i = 0; i < itemKriteria.length; i++) {
    kriteria = $(itemKriteria[i]).find(".kriteria");
    if (kriteria) {
      txtValueKriteria = $(kriteria)
        .text()
        .toUpperCase();
      if (txtValueKriteria.indexOf(filter) > -1) {
        itemKriteria[i].style.display = "";
      } else {
        itemKriteria[i].style.display = "none";
      }
    }
  }

  totalInactive = $("#dataKriteria .itemKriteria:hidden");

  if (itemKriteria.length == totalInactive.length) {
    document.getElementById("kriteriaTidakDitemukan").style.display = "block";
  } else {
    document.getElementById("kriteriaTidakDitemukan").style.display = "none";
  }
});
