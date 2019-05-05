function eror(){
    var usernameDosenAdmin = document.getElementById("usernameDosenAdmin").value;

    var passwordDosenAdmin = document.getElementById("passwordDosenAdmin").value;

    var fileid = document.getElementById("fileid").value;

    var nimDosenAdmin = document.getElementById("nimDosenAdmin").value;

    var namaDosenAdmin = document.getElementById("namaDosenAdmin").value;

    var tempatlahirDosenAdmin = document.getElementById("tempatlahirDosenAdmin").value;

    var alamatDosenAdmin = document.getElementById("alamatDosenAdmin").value;

    // var kelasDosenAdmin = document.getElementById("kelasDosenAdmin").value;
    
    if(usernameDosenAdmin==""){
        document.getElementById("usernameDosenAdminBlank").innerHTML="*Masukkan Username";
    }

    else if(usernameDosenAdmin!=""){
        document.getElementById("usernameDosenAdminBlank").innerHTML="";
    }


    if(passwordDosenAdmin==""){
        document.getElementById("passwordDosenAdminBlank").innerHTML="*Masukkan Password";
    }

    else if(passwordDosenAdmin!=""){
        document.getElementById("passwordDosenAdminBlank").innerHTML="";
    }

    if(fileid==""){
        document.getElementById("fileidDosenAdminBlank").innerHTML="*Upload File Gambar";
    }

    else if(fileid!=""){
        document.getElementById("fileidDosenAdminBlank").innerHTML="";
    }

    if(nimDosenAdmin==""){
        document.getElementById("nimDosenAdminBlank").innerHTML="*Masukkan NIM";
    }

    else if(nimDosenAdmin!=""){
        document.getElementById("nimDosenAdminBlank").innerHTML="";
    }


    if(namaDosenAdmin==""){
        document.getElementById("namaDosenAdminBlank").innerHTML="*Masukkan Nama Dosen";
    }

    else if(namaDosenAdmin!=""){
        document.getElementById("namaDosenAdminBlank").innerHTML="";
    }


    if(tempatlahirDosenAdmin==""){
        document.getElementById("tempatlahirDosenAdminBlank").innerHTML="*Masukkan Tempat Lahir Dosen";
    }

    else if(usernameDosenAdmin!=""){
        document.getElementById("tempatlahirDosenAdminBlank").innerHTML="";
    }


    if(alamatDosenAdmin==""){
        document.getElementById("alamatDosenAdminBlank").innerHTML="*Masukkan Alamat Dosen";
    }

    else if(alamatDosenAdmin!=""){
        document.getElementById("alamatDosenAdminBlank").innerHTML="";
    }


    // if(kelasDosenAdmin==""){
    //     document.getElementById("kelasDosenAdminBlank").innerHTML="*Masukkan Kelas Dosen";
    // }

    // else if(kelasDosenAdmin!=""){
    //     document.getElementById("kelasDosenAdminBlank").innerHTML="";
    // }
}

function setupDosen() {
    document.getElementById('tombolid').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('file').click();
    }
}

function preview_images(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevDosenAdmin");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function showFilesSizes() {
    var input, file;
  
    input = document.getElementById("fileid");
  
    file = input.files[0];
  
    if (file.size > 1000000) {
      document.getElementById("fileidDosenAdminBlank").innerHTML = "* Ukuran melebihi 1 MB";
    } else if (file.size < 1000000) {
      document.getElementById("fileidDosenAdminBlank").innerHTML = "";
    }
  }

  function Cobacobacoba(){
    var usernameDosenAdmin = document.getElementById("usernameDosenAdmin").value;

    var passwordDosenAdmin = document.getElementById("passwordDosenAdmin").value;

    var fileid = document.getElementById("fileid").value;

    var nimDosenAdmin = document.getElementById("nimDosenAdmin").value;

    var namaDosenAdmin = document.getElementById("namaDosenAdmin").value;

    var tempatlahirDosenAdmin = document.getElementById("tempatlahirDosenAdmin").value;

    var alamatDosenAdmin = document.getElementById("alamatDosenAdmin").value;

    // var kelasDosenAdmin = document.getElementById("kelasDosenAdmin").value;
    
    if(usernameDosenAdmin==""){
        document.getElementById("usernameDosenAdminBlank").innerHTML="*Masukkan Username";
    }

    else if(usernameDosenAdmin!=""){
        document.getElementById("usernameDosenAdminBlank").innerHTML="";
    }


    if(passwordDosenAdmin==""){
        document.getElementById("passwordDosenAdminBlank").innerHTML="*Masukkan Password";
    }

    else if(passwordDosenAdmin!=""){
        document.getElementById("passwordDosenAdminBlank").innerHTML="";
    }

    if(fileid==""){
        document.getElementById("fileidDosenAdminBlank").innerHTML="*Upload File Gambar";
    }

    else if(fileid!=""){
        document.getElementById("fileidDosenAdminBlank").innerHTML="";
    }

    if(nimDosenAdmin==""){
        document.getElementById("nimDosenAdminBlank").innerHTML="*Masukkan NIM";
    }

    else if(nimDosenAdmin!=""){
        document.getElementById("nimDosenAdminBlank").innerHTML="";
    }


    if(namaDosenAdmin==""){
        document.getElementById("namaDosenAdminBlank").innerHTML="*Masukkan Nama Dosen";
    }

    else if(namaDosenAdmin!=""){
        document.getElementById("namaDosenAdminBlank").innerHTML="";
    }


    if(tempatlahirDosenAdmin==""){
        document.getElementById("tempatlahirDosenAdminBlank").innerHTML="*Masukkan Tempat Lahir Dosen";
    }

    else if(usernameDosenAdmin!=""){
        document.getElementById("tempatlahirDosenAdminBlank").innerHTML="";
    }


    if(alamatDosenAdmin==""){
        document.getElementById("alamatDosenAdminBlank").innerHTML="*Masukkan Alamat Dosen";
    }

    else if(alamatDosenAdmin!=""){
        document.getElementById("alamatDosenAdminBlank").innerHTML="";
    }


    // if(kelasDosenAdmin==""){
    //     document.getElementById("kelasDosenAdminBlank").innerHTML="*Masukkan Kelas Dosen";
    // }

    // else if(kelasDosenAdmin!=""){
    //     document.getElementById("kelasDosenAdminBlank").innerHTML="";
    // }
}