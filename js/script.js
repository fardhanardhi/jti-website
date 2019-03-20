$("#navigation-btn").click(function() {
  $("#navigation")
    .stop()
    .fadeIn(300);
});

$("#navigation").click(function() {
  $("#navigation")
    .stop()
    .fadeOut(300);
});
