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

function Coba() {
  var foto = document.getElementById("foto").value;
  var passwordLama = document.getElementById("passwordLama").value;
  var passwordBaru = document.getElementById("passwordBaru").value;
  var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;

  if (
    foto == "" ||
    passwordLama == "" ||
    passwordBaru == "" ||
    konfirmasiPassword == ""
  ) {
    document.getElementById("Blank").innerHTML =
      "* Terdapat kolom yang belum diisi";
  } else if (
    foto != "" ||
    passwordLama != "" ||
    passwordBaru != "" ||
    konfirmasiPassword != ""
  ) {
    document.getElementById("Blank").innerHTML = "";

    if (konfirmasiPassword != passwordBaru) {
      document.getElementById("konfirmasipasswordSalah").innerHTML =
        "* Konfirmasi password tidak sesuai";
    } else if (konfirmasiPassword == passwordBaru) {
      document.getElementById("konfirmasipasswordSalah").innerHTML = "";
    }
  }
}

function reset_Blank() {
  var foto = document.getElementById("foto").value;
  var passwordLama = document.getElementById("passwordLama").value;
  var passwordBaru = document.getElementById("passwordBaru").value;
  var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;

  if (
    foto != "" &&
    passwordLama != "" &&
    passwordBaru != "" &&
    konfirmasiPassword != ""
  ) {
    document.getElementById("Blank").innerHTML = "";
  }
}

function showFilesSize() {
  var input, file;

  input = document.getElementById("foto");

  file = input.files[0];

  if (file.size > 1000000) {
    document.getElementById("fotoSize").innerHTML = "* Ukuran melebihi 1 MB";
  } else if (file.size < 1000000) {
    document.getElementById("fotoSize").innerHTML = "";
  }
}

function reset_Size() {
  var input, file;

  input = document.getElementById("foto");

  file = input.files[0];

  if (file.size < 8000000) {
    document.getElementById("fotoSize").innerHTML = "";
  }
}

function reset_Check() {
  var input = document.getElementById("foto");

  var filePath = input.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if (allowedExtensions.exec(filePath)) {
    document.getElementById("fotoType").innerHTML = "";
    fileInput.value = "";
    return true;
  }
}

function checkFoto() {
  var input = document.getElementById("foto");

  var filePath = input.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if (!allowedExtensions.exec(filePath)) {
    document.getElementById("fotoType").innerHTML =
      "* Ekstensi file tidak sesuai";
    fileInput.value = "";
    return false;
  } else {
    document.getElementById("fotoType").innerHTML = "";
  }
}

function preview_image(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById("fotoPrev");
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}

//   Popover
$(function() {
  $('[data-toggle="popover"]').popover();
});

function showPasswordLama() {
  var password = document.getElementById("passwordLama");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eyeA").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

function showPasswordBaru() {
  var password = document.getElementById("passwordBaru");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eyeB").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

function showPasswordKonfirmasi() {
  var password = document.getElementById("konfirmasiPassword");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eyeC").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

$(".custom-file-input").on("change", function() {
  var fileName = $(this)
    .val()
    .split("\\")
    .pop();
  $(this)
    .siblings(".custom-file-label")
    .addClass("selected")
    .html(nanana);
});

//   Popover
$(function() {
  $('[data-toggle="popover"]').popover();
});

// Login form validation
function validateUsername(input) {
  if (input.value == "") {
    document.getElementById('error-handling').classList.remove('d-none');
    document.getElementById('error-handling').classList.add('d-flex');
    document.getElementById('error-handling').innerHTML = "*Username harus diisi";
    if(getUrl('error')==undefined || getUrl('error')!=''){
      document.getElementById('error-handling2').classList.add('d-none');
      document.getElementById('error-handling2').classList.remove('d-flex');
    }
    return false;
  }else if(!/^[0-9]+$/.test(input.value)) {
    document.getElementById('error-handling').classList.remove('d-none');
    document.getElementById('error-handling').classList.add('d-flex');
    document.getElementById('error-handling').innerHTML = "*Username Invalid";
    if(getUrl('error')==undefined || getUrl('error')!=''){
      document.getElementById('error-handling2').classList.add('d-none');
      document.getElementById('error-handling2').classList.remove('d-flex');
    }
    return false;
  }
  else {
    document.getElementById('error-handling').classList.add('d-none');
    document.getElementById('error-handling').classList.remove('d-flex');
    document.getElementById('error-handling').innerHTML = "";
    if(getUrl('error')==undefined || getUrl('error')!=''){
      document.getElementById('error-handling2').classList.add('d-none');
      document.getElementById('error-handling2').classList.remove('d-flex');
    }
    return true;
  }
}

function validatePassword(input){
  if (input.value == "") {
    document.getElementById('error-handling').classList.remove('d-none');
    document.getElementById('error-handling').classList.add('d-flex');
    document.getElementById('error-handling').innerHTML = "*Password harus diisi";
    if(getUrl('error')==undefined || getUrl('error')!=''){
      document.getElementById('error-handling2').classList.add('d-none');
      document.getElementById('error-handling2').classList.remove('d-flex');
    }
    return false;
  }
  else {
    document.getElementById('error-handling').classList.add('d-none');
    document.getElementById('error-handling').classList.remove('d-flex');
    document.getElementById('error-handling').innerHTML = "";
    if(getUrl('error')==undefined || getUrl('error')!=''){
      document.getElementById('error-handling2').classList.add('d-none');
      document.getElementById('error-handling2').classList.remove('d-flex');
    }
    return true;
  }
}

function validateOnSubmit(){
  if(validateUsername(document.getElementById('username'))==false){
    return false;
  }
  if(validatePassword(document.getElementById('password'))==false){
    return false;
  }
  return true;
}

function getUrl(variable)
{
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
          var pair = vars[i].split("=");
          if(pair[0] == variable){return pair[1];}
  }
  return(false);
}
// End login form validation



