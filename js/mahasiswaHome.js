// set tanggal ke hidden input
$("#datepickerSearchBerita").datepicker({ format: "yyyy/mm/dd" });

// $(document).ready(function() {
//   $(".hasilSearchBerita").on("click", function() {
//     var d = $(this).data("idinfo");
//     alert(d);
//     console.log(d, " hahsaj");
//   });
// });

$(document).on("click", ".hasilSearchBerita", function(e) {
  e.preventDefault();
  var d = $(this).data("idinfo");
  alert(d);
});

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
