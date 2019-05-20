Beritacharcountupdate("");

function Beritacharcountupdate(beritacount) {
  var lng = beritacount.length;
  document.getElementById("Bercharcount").innerHTML = lng + "/500";
}

$("#datepickerCariBerita").datepicker({ format: "yyyy/mm/dd" });
// $("#tanggalBerita").datepicker();

// KHS MODAL LIHAT
$(".detail-berita").click(function() {
  var id_info = $(this).attr("data-info");

  $.ajax({
    url: "../process/proses_berita.php",
    method: "post",
    data: {
      tampilDetailInfo: id_info
    },
    success: function(data) {
      $("#Tampildetail-berita").html(data);
      $("#modalPreview").modal("show");
    }
  });
});

$("#adminCariBerita").click(function() {
  var tanggal = $("#tanggalBerita").val();

  $.ajax({
    url: "../process/proses_berita.php",
    method: "GET",
    data: {
      adminCariBerita: true,
      tanggal: tanggal
    },
    success: function(response) {
      $("#tabelBerita")
        .empty()
        .append(response);
    }
  });
});
