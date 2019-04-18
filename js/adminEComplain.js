var idUserTujuan = null;

$(document).ready(function() {
  // save comment to database

  recentChat(idUserTujuan);
  chat(idUserTujuan);

  refresh();

  $(document).on("click", ".recent-chat-item", function() {
    idUserTujuan = $(this).data("id");
    // $(".recent-chat-item").removeClass("active");
    // $(this).addClass("active");
    recentChat(idUserTujuan);
    chat(idUserTujuan);
  });

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
        // remove the deleted comment

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
});

function recentChatSearch() {
  var input,
    filter,
    recentChat,
    recentChatItem,
    recentName,
    recentIsi,
    i,
    txtValueName,
    txtValueIsi;
  input = $("#recentChatInput");
  filter = $(input)
    .val()
    .toUpperCase();
  recentChatItem = $("#recentChat .recent-chat-item");
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
}
