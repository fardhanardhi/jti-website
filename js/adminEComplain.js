$(document).ready(function() {
  // save comment to database
  recentChat();
  chat();

  refresh();

  function refresh() {
    clearInterval();
    setInterval(function() {
      recentChat();
      chat();
    }, 2000);
  }

  function recentChat() {
    var idUser = $("#idUser").val();
    $.ajax({
      url: "../process/proses_eComplain.php",
      type: "GET",
      data: {
        tampilRecentChat: 1,
        idUser: idUser
      },
      success: function(response) {
        // remove the deleted comment

        $("#recentChat")
          .empty()
          .append(response);
      }
    });
  }

  function chat() {
    var idUser = $("#idUser").val();
    $.ajax({
      url: "../process/proses_eComplain.php",
      type: "GET",
      data: {
        tampilChat: 1,
        idUser: idUser
      },
      success: function(response) {
        // remove the deleted comment

        $("#chatWindow")
          .empty()
          .append(response);
      }
    });
  }

  // $(document).on("click", "#submit_btn", function () {
  //   refresh();
  //   var name = $("#name").val();
  //   var comment = $("#comment").val();
  //   $.ajax({
  //     url: "server.php",
  //     type: "POST",
  //     data: {
  //       save: 1,
  //       name: name,
  //       comment: comment
  //     },
  //     success: function (response) {
  //       $("#name").val("");
  //       $("#comment").val("");
  //       $("#display_area").append(response);
  //     }
  //   });
  // });
  // // delete from database
  // $(document).on("click", ".delete", function () {
  //   refresh();
  //   var id = $(this).data("id");
  //   $clicked_btn = $(this);
  //   $.ajax({
  //     url: "server.php",
  //     type: "GET",
  //     data: {
  //       delete: 1,
  //       id: id
  //     },
  //     success: function (response) {
  //       // remove the deleted comment
  //       $clicked_btn.parent().remove();
  //       $("#name").val("");
  //       $("#comment").val("");
  //     }
  //   });
  // });
  // var edit_id;
  // var $edit_comment;
  // $(document).on("click", ".edit", function () {
  //   edit_id = $(this).data("id");
  //   $edit_comment = $(this).parent();
  //   // grab the comment to be editted
  //   var name = $(this)
  //     .siblings(".display_name")
  //     .text();
  //   var comment = $(this)
  //     .siblings(".comment_text")
  //     .text();
  //   // place comment in form
  //   $("#name").val(name);
  //   $("#comment").val(comment);
  //   $("#submit_btn").hide();
  //   $("#update_btn").show();
  // });
  // $(document).on("click", "#update_btn", function () {
  //   refresh();
  //   var id = edit_id;
  //   var name = $("#name").val();
  //   var comment = $("#comment").val();
  //   $.ajax({
  //     url: "server.php",
  //     type: "POST",
  //     data: {
  //       update: 1,
  //       id: id,
  //       name: name,
  //       comment: comment
  //     },
  //     success: function (response) {
  //       $("#name").val("");
  //       $("#comment").val("");
  //       $("#submit_btn").show();
  //       $("#update_btn").hide();
  //       $edit_comment.replaceWith(response);
  //     }
  //   });
  // });
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
