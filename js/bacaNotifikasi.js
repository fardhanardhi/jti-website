jQuery(document).ready(function($) {
  $(".baca-notifikasi").click(function() {
    window.location = $(this).data("href");
  });
});