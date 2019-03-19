$("#navigation").hide();

$("#navigation-btn").click(function() {
  $("#navigation").fadeIn(700);
  $("#in-navigation-btn")
    .delay(2000)
    .children("i")
    .removeClass("fas fa-bars")
    .addClass("fas fa-times");
});

$("#navigation").click(function() {
  $("#navigation")
    // .stop()
    .fadeOut(1000);
});
