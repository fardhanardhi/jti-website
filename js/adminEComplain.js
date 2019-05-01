var idUserTujuan = null;

function recentChatSearch() {
  var input,
    filter,
    recentChat,
    recentChatItem,
    recentName,
    recentIsi,
    i,
    txtValueName,
    txtValueIsi,
    totalInactive;
  input = $("#recentChatInput");
  filter = $(input)
    .val()
    .toUpperCase();
  recentChatItem = $("#recentChat .recent-chat-item");
  totalInactive = $("#recentChat .recent-chat-item:hidden");
  for (i = 0; i < recentChatItem.length; i++) {
    recentName = $(recentChatItem[i]).find(".recentName");
    recentIsi = $(recentChatItem[i]).find(".recentIsi");
    if (recentName || recentIsi) {
      txtValueName = $(recentName)
        .text()
        .toUpperCase();
      txtValueIsi = $(recentIsi)
        .text()
        .toUpperCase();
      if (
        txtValueName.indexOf(filter) > -1 ||
        txtValueIsi.indexOf(filter) > -1
      ) {
        recentChatItem[i].style.display = "";
      } else {
        recentChatItem[i].style.display = "none";
      }
    }
  }
  $("#infoTidakDitemukan").hide();
  $("#infoTidakDitemukan").remove();

  if (recentChatItem.length == totalInactive.length) {
    if (!$("#infoTidakDitemukan").length) {
      $("#recentChat").append(
        "<div id='infoTidakDitemukan' class='row pt-5'><div  class='infoTidakDitemukan col text-center text-muted'>Pencarian tidak dapat ditemukan</div></div>"
      );
    }
  }
}

$(document).ready(function() {
  reload();

  refresh();

  $(document).on("click", ".recent-chat-item", function() {
    idUserTujuan = $(this).data("id");
    reload();
    $("#inputChat").prop("disabled", false);
  });

  $(document).on("click", ".btn-send", function() {
    kirimChat();
  });

  // detect enter
  $("#inputChat").keydown(function(e) {
    if (e.keyCode == 13) {
      kirimChat();
    }
  });

  function kirimChat() {
    var isiChat = $("#inputChat").val();
    var idUser = $("#idUser").val();
    if ($.trim(isiChat) != "") {
      $.ajax({
        url: "../process/proses_eComplain.php",
        type: "POST",
        data: {
          sendChat: 1,
          isiChat: isiChat,
          idUser: idUser,
          idUserTujuan: idUserTujuan
        },
        success: function(response) {
          $("#inputChat").val("");
          reload();
        }
      });
    } else {
      alert("Pesan tidak boleh kosong");
      $("#inputChat").val("");
    }
  }

  function bottomSCroll() {
    $("#chatWindow")
      .stop()
      .animate(
        {
          scrollTop: $("#chatWindow")[0].scrollHeight
        },
        800
      );
  }

  function reload() {
    // $("#chatWindow").animate({ scrollTop: 20000000 }, "slow");
    bottomSCroll();
    recentChat(idUserTujuan);
    chat(idUserTujuan);
    namaUserTujuan(idUserTujuan);
  }

  function refresh() {
    clearInterval();
    setInterval(function() {
      // cek apakah search kosong
      if ($.trim($("input[type=text]").val()) == "") {
        recentChat(idUserTujuan);
      } else {
        // jika tidak kosong refresh
        recentChatSearch();
      }
      chat(idUserTujuan);
    }, 2000);
  }

  function recentChat(userTujuanId) {
    var idUser = $("#idUser").val();
    $.ajax({
      url: "../process/proses_eComplain.php",
      type: "GET",
      data: {
        tampilRecentChat: 1,
        idUser: idUser,
        idUserTujuan: userTujuanId
      },
      success: function(response) {
        $("#recentChat")
          .empty()
          .append(response);
      }
    });
  }

  function chat(userTujuanId) {
    var idUser = $("#idUser").val();
    $.ajax({
      url: "../process/proses_eComplain.php",
      type: "GET",
      data: {
        tampilChat: 1,
        idUser: idUser,
        idUserTujuan: userTujuanId
      },
      success: function(response) {
        // remove the deleted comment

        $("#chatWindow")
          .empty()
          .append(response);
      }
    });
  }

  function namaUserTujuan(userTujuanId) {
    var idUser = $("#idUser").val();
    $.ajax({
      url: "../process/proses_eComplain.php",
      type: "GET",
      data: {
        tampilNamaUserTujuan: 1,
        idUser: idUser,
        idUserTujuan: userTujuanId
      },
      success: function(response) {
        $("#namaUserTujuan")
          .empty()
          .append(response);
      }
    });
  }
});
