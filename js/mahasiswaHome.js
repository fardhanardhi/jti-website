// set tanggal ke hidden input
$("#datepickerSearchBerita").datepicker({ format: "yyyy/mm/dd" });

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

// $("#inputChat").keydown(function (e) {
//   if (e.keyCode == 13) {
//     kirimChat();
//   }
// });

$(".input-komentar").keydown(function(e) {
  if (e.keyCode == 13 && !e.shiftKey) {
    e.preventDefault();

    var iduser = $(this).data("iduser");
    var idinfo = $(this).data("idinfo");
    var val = $(this).val();

    $.ajax({
      url: "../process/proses_homeMahasiswa.php",
      type: "POST",
      data: {
        insertKomentar: 1,
        iduser: iduser,
        idinfo: idinfo,
        val: val
      },
      success: function(response) {
        location.reload();

        // $("#hasilPencarianBerita")
        //   .empty()
        //   .append(response);
      }
    });
  }
});
