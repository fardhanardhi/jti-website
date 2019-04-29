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

$("#navigation-admin-btn").click(function() {
  $("#navigation-admin")
    .stop()
    .fadeIn(300);
});

$("#navigation-admin-close, #navigation-admin-close2").click(function() {
  $("#navigation-admin")
    .stop()
    .fadeOut(300);
});

// show password
function showPassword() {
  var password = document.getElementById("password");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eye").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

// datepicker
$("#datepicker").datepicker();

// set tanggal ke hidden input
$("#datepicker").on("changeDate", function() {
  $("#my_hidden_input").val($("#datepicker").datepicker("getFormattedDate"));
});

// lightbox(preview gambar)
$(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});

// Initialize tooltip component
$(function() {
  $('[data-toggle="tooltip"]').tooltip();
});

// Initialize popover component
$(function() {
  $('[data-toggle="popover"]').popover();
});

//   Popover
$(function() {
  $('[data-toggle="popover"]').popover();
});

// Login form validation
function validateUsername(input) {
  if (input.value == "") {
    document.getElementById("error-handling").classList.remove("d-none");
    document.getElementById("error-handling").classList.add("d-flex");
    document.getElementById("error-handling").innerHTML =
      "*Username harus diisi";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return false;
  } else if (!/^[0-9]+$/.test(input.value)) {
    document.getElementById("error-handling").classList.remove("d-none");
    document.getElementById("error-handling").classList.add("d-flex");
    document.getElementById("error-handling").innerHTML = "*Username Invalid";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return false;
  } else {
    document.getElementById("error-handling").classList.add("d-none");
    document.getElementById("error-handling").classList.remove("d-flex");
    document.getElementById("error-handling").innerHTML = "";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return true;
  }
}

function validatePassword(input) {
  if (input.value == "") {
    document.getElementById("error-handling").classList.remove("d-none");
    document.getElementById("error-handling").classList.add("d-flex");
    document.getElementById("error-handling").innerHTML =
      "*Password harus diisi";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return false;
  } else {
    document.getElementById("error-handling").classList.add("d-none");
    document.getElementById("error-handling").classList.remove("d-flex");
    document.getElementById("error-handling").innerHTML = "";
    if (getUrl("error") == undefined || getUrl("error") != "") {
      document.getElementById("error-handling2").classList.add("d-none");
      document.getElementById("error-handling2").classList.remove("d-flex");
    }
    return true;
  }
}

function validateOnSubmit() {
  if (validateUsername(document.getElementById("username")) == false) {
    return false;
  }
  if (validatePassword(document.getElementById("password")) == false) {
    return false;
  }
  return true;
}

function getUrl(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  }
  return false;
}
// End login form validation

// Validasi Kriteria Kuisioner
function validasiTambahKriteria(input) {
  if (input.value == "") {
    document.getElementById("peringatanTambah").classList.remove("d-none");
    document.getElementById("tambahIsiKriteria").classList.add("border-danger");
    return false;
  } else {
    document.getElementById("peringatanTambah").classList.add("d-none");
    document
      .getElementById("tambahIsiKriteria")
      .classList.remove("border-danger");
    return true;
  }
}

function validasiEditKriteria(input) {
  if (input.value == "") {
    document.getElementById("peringatanEdit").classList.remove("d-none");
    document.getElementById("editIsiKriteria").classList.add("border-danger");
    return false;
  } else {
    document.getElementById("peringatanEdit").classList.add("d-none");
    document
      .getElementById("editIsiKriteria")
      .classList.remove("border-danger");
    return true;
  }
}

function validasiSubmitTambahKriteria() {
  if (
    validasiTambahKriteria(document.getElementById("tambahIsiKriteria")) ==
    false
  ) {
    return false;
  }
  return true;
}

function validasiSubmitEditKriteria() {
  if (
    validasiEditKriteria(document.getElementById("editIsiKriteria")) == false
  ) {
    return false;
  }
  return true;
}
// End Validasi Kriteria Kuisioner

//Tooltip Berita
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
});

// chat
// $(".chat-popup").hide();

$("#toggleChat").click(function() {
  $("#chatPopup").show();
});

$("#closeChatPopup").click(function() {
  $("#chatPopup").hide();
});
