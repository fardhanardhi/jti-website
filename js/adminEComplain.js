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
