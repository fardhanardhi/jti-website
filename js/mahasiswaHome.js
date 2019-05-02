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

$(".reply-listener")
  .mouseenter(function() {
    $(this)
      .find(".btn-reply-container")
      .append(
        "<strong style='cursor: pointer' class='col-auto btn-reply text-success'>Reply</strong>"
      );

    var replyEl = $(this);

    $(".btn-reply").click(function() {
      // alert(
      //   $(replyEl)
      //     .parent()
      //     .parent()
      //     .find("balas-komen")
      //     .append("asdsafdaf")
      // );
      $(replyEl)
        .parent()
        .parent()
        .find(".balas-komen")
        .append(
          "<div class='col mr-0'><input class='form-control form-control-sm' id='inputsm' placeholder='Tulis balasan' type='text'></div>"
        );
    });
  })
  .mouseleave(function() {
    $(this)
      .find(".btn-reply")
      .remove();
  });
