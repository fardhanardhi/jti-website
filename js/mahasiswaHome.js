// set tanggal ke hidden input
$("#datepickerSearchBerita").datepicker({ format: "yyyy/mm/dd" });

$("#datepickerSearchBerita").on("changeDate", function() {
  var tglPencarianBerita = $("#datepickerSearchBerita").datepicker(
    "getFormattedDate"
  );

  $.ajax({
    url: "../process/proses_homeMahasiswa.php",
    type: "GET",
    data: {
      searchBerita: 1,
      tglPencarianBerita: tglPencarianBerita
    },
    success: function(response) {
      console.log(response);

      $("#hasilPencarianBerita")
        .empty()
        .append(response);
    }
  });
});
