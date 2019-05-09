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

$("#txtCariPemesanan").keyup(function() {
  var input,
    filter,
    itemPemesanan,
    nama,
    tanggalPinjam,
    waktuMulai,
    kodeRuang,
    pesan,
    selesai,
    i,
    txtValueNama,
    txtValueTanggalPinjam,
    txtValueWaktuMulai,
    txtValueKodeRuang,
    txtValuePesan,
    txtValueSelesai,
    totalInactive;
  input = $("#txtCariPemesanan");
  filter = $(input)
    .val()
    .toUpperCase();
  itemPemesanan = $("#pemesanan-ruang .itemPemesanan");
  for (i = 0; i < itemPemesanan.length; i++) {
    nama = $(itemPemesanan[i]).find(".nama");
    tanggalPinjam = $(itemPemesanan[i]).find(".tanggalPinjam");
    waktuMulai = $(itemPemesanan[i]).find(".waktuMulai");
    kodeRuang = $(itemPemesanan[i]).find(".kodeRuang");
    pesan = $(itemPemesanan[i]).find(".pesan");
    selesai = $(itemPemesanan[i]).find(".selesai");
    if (nama || tanggalPinjam || waktuMulai || kodeRuang || pesan || selesai) {
      txtValueNama = $(nama)
        .text()
        .toUpperCase();
      txtValueTanggalPinjam = $(tanggalPinjam)
        .text()
        .toUpperCase();
      txtValueWaktuMulai = $(waktuMulai)
        .text()
        .toUpperCase();
      txtValueKodeRuang = $(kodeRuang)
        .text()
        .toUpperCase();
      txtValuePesan = $(pesan)
        .text()
        .toUpperCase();
      txtValueSelesai = $(selesai)
        .text()
        .toUpperCase();
      if (
        txtValueNama.indexOf(filter) > -1 ||
        txtValueTanggalPinjam.indexOf(filter) > -1 ||
        txtValueWaktuMulai.indexOf(filter) > -1 ||
        txtValueKodeRuang.indexOf(filter) > -1 ||
        txtValuePesan.indexOf(filter) > -1 ||
        txtValueSelesai.indexOf(filter) > -1
      ) {
        itemPemesanan[i].style.display = "";
      } else {
        itemPemesanan[i].style.display = "none";
      }
    }
  }

  totalInactive = $("#pemesanan-ruang .itemPemesanan:hidden");

  if (itemPemesanan.length == totalInactive.length) {
    document.getElementById("pemesananTidakDitemukan").style.display = "block";
  } else {
    document.getElementById("pemesananTidakDitemukan").style.display = "none";
  }
});

$("#txtCariRuangan").keyup(function() {
  var input,
    filter,
    itemRuangan,
    kode,
    lantai,
    i,
    txtValueKode,
    txtValueLantai,
    totalInactive;

  input = $("#txtCariRuangan");

  filter = $(input)
    .val()
    .toUpperCase();
  itemRuangan = $("#ruangan2 .itemRuangan");

  for (i = 0; i < itemRuangan.length; i++) {
    kode = $(itemRuangan[i]).find(".kode");
    lantai = $(itemRuangan[i]).find(".lantaiRuangan");
    if (kode || lantai) {
      txtValueKode = $(kode)
        .text()
        .toUpperCase();
      txtValueLantai = $(lantai)
        .text()
        .toUpperCase();
      if (
        txtValueKode.indexOf(filter) > -1 ||
        txtValueLantai.indexOf(filter) > -1
      ) {
        itemRuangan[i].style.display = "block";
      } else {
        itemRuangan[i].style.display = "none";
      }
    }
  }

  totalInactive = $("#ruangan2 .itemRuangan:hidden");

  if (itemRuangan.length == totalInactive.length) {
    document.getElementById("ruanganTidakDitemukan").style.display = "block";
  } else {
    document.getElementById("ruanganTidakDitemukan").style.display = "none";
  }
});

$(".hapus-ruang").click(function() {
  var id_ruang = $(this).attr("id");
  $("#id_ruangHapus").val(id_ruang);
});

$(".checkout-ruang-admin").click(function() {
  var id_ruang_dipinjam = $(this).attr("id");
  $("#id_ruang_dipinjam").val(id_ruang_dipinjam);
});
