$("#cariKelasKosongMhs").click(function() {
  var radioHari = $("input[name='hari']:checked").val(),
    jam = $("#jamKelasKosong").val();

  $.ajax({
    url: "../process/proses_kelasKosong.php",
    method: "post",
    data: { cariKelasKosong: true, hari: radioHari, jam: jam },
    success: function(data) {
      $("#dataKelasKosongMhs").html(data);
    }
  });
});

$(".checkout-kelas").click(function() {
  var id_ruang_dipinjam = $(this).attr("id");
  $("#id_ruang_dipinjam_mhs").val(id_ruang_dipinjam);
  $("#modalCheckout").modal("show");
});

$(document).ready(function() {
  setInterval(function() {
    $.ajax({
      url: "../process/proses_kelasKosong.php",
      method: "post",
      data: { autoCheckout: true },
      success: function() {
        reloadKelasKosongMhs();
      }
    });
  }, 2000);
});

// fungsi untuk reload semua div
function reloadKelasKosongMhs() {
  ruangKosongMhs();
  ruangDipesanMhs();
}

// fungsi untuk reload ruang kosong
function ruangKosongMhs() {
  var radioHari = $("input[name='hari']:checked").val(),
    jam = $("#jamKelasKosong").val();

  $.ajax({
    url: "../process/proses_kelasKosong.php",
    method: "post",
    data: { cariKelasKosong: true, hari: radioHari, jam: jam },
    success: function(data) {
      $("#dataKelasKosongMhs").html(data);
    }
  });
}

// fungsi untuk reload ruangan dipesan
function ruangDipesanMhs() {
  $.ajax({
    url: "../process/proses_kelasKosong.php",
    method: "post",
    data: { ruangDipesan: true },
    success: function(data) {
      $("#ruang-dipesan-mhs").html(data);
    }
  });
}
