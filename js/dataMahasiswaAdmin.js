

function setup3() {
    document.getElementById('buttonid3').addEventListener('click', openDialog2);
    function openDialog2() {
        document.getElementById('fileid3').click();
    }
}


function setup2() {
    document.getElementById('buttonid2').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('fileid2').click();
    }
}

function preview_images6(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevMahasiswaAdmin2");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function preview_images22(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevMahasiswaAdmin3");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
  

  function showFilesSizes222() {
    var input, file;
  
    input = document.getElementById("fileid2");
  
    file = input.files[0];
  
    if (file.size > 1000000) {
      document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "* Ukuran melebihi 1 MB";
    } else if (file.size < 1000000) {
      document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "";
    }
  }

  function showFilesSizes22() {
    var input, file;
  
    input = document.getElementById("fileid3");
  
    file = input.files[0];
  
    if (file.size > 1000000) {
      document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "* Ukuran melebihi 1 MB";
    } else if (file.size < 1000000) {
      document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "";
    }
  }



  function Testing(){
    var usernameMahasiswaAdmin2 = document.getElementById("usernameMahasiswaAdmin2").value;

    var passwordMahasiswaAdmin2 = document.getElementById("passwordMahasiswaAdmin2").value;

    var fileid3 = document.getElementById("fileid3").value;

    var nimMahasiswaAdmin2 = document.getElementById("nimMahasiswaAdmin2").value;

    var namaMahasiswaAdmin2 = document.getElementById("namaMahasiswaAdmin2").value;

    var tempatlahirMahasiswaAdmin2 = document.getElementById("tempatlahirMahasiswaAdmin2").value;

    var alamatMahasiswaAdmin2 = document.getElementById("alamatMahasiswaAdmin2").value;

    var kelasMahasiswaAdmin2 = document.getElementById("kelasMahasiswaAdmin2").value;
    
    if(usernameMahasiswaAdmin2==""){
        document.getElementById("usernameMahasiswaAdminBlank2").innerHTML="*Masukkan Username";
    }

    else if(usernameMahasiswaAdmin2!=""){
        document.getElementById("usernameMahasiswaAdminBlank2").innerHTML="";
    }


    if(passwordMahasiswaAdmin2==""){
        document.getElementById("passwordMahasiswaAdminBlank2").innerHTML="*Masukkan Password";
    }

    else if(passwordMahasiswaAdmin2!=""){
        document.getElementById("passwordMahasiswaAdminBlank2").innerHTML="";
    }

    if(fileid3==""){
        document.getElementById("fileidMahasiswaAdminBlank2").innerHTML="*Upload File Gambar";
    }

    else if(fileid3!=""){
        document.getElementById("fileidMahasiswaAdminBlank2").innerHTML="";
    }

    if(nimMahasiswaAdmin2==""){
        document.getElementById("nimMahasiswaAdminBlank2").innerHTML="*Masukkan NIM";
    }

    else if(nimMahasiswaAdmin2!=""){
        document.getElementById("nimMahasiswaAdminBlank2").innerHTML="";
    }


    if(namaMahasiswaAdmin2==""){
        document.getElementById("namaMahasiswaAdminBlank2").innerHTML="*Masukkan Nama Mahasiswa";
    }

    else if(namaMahasiswaAdmin2!=""){
        document.getElementById("namaMahasiswaAdminBlank2").innerHTML="";
    }


    if(tempatlahirMahasiswaAdmin2==""){
        document.getElementById("tempatlahirMahasiswaAdminBlank2").innerHTML="*Masukkan Tempat Lahir Mahasiswa";
    }

    else if(usernameMahasiswaAdmin2!=""){
        document.getElementById("tempatlahirMahasiswaAdminBlank2").innerHTML="";
    }


    if(alamatMahasiswaAdmin2==""){
        document.getElementById("alamatMahasiswaAdminBlank2").innerHTML="*Masukkan Alamat Mahasiswa";
    }

    else if(alamatMahasiswaAdmin2!=""){
        document.getElementById("alamatMahasiswaAdminBlank2").innerHTML="";
    }


    if(kelasMahasiswaAdmin2==""){
        document.getElementById("kelasMahasiswaAdminBlank2").innerHTML="*Masukkan Kelas Mahasiswa";
    }

    else if(kelasMahasiswaAdmin2!=""){
        document.getElementById("kelasMahasiswaAdminBlank2").innerHTML="";
    }
}



function Validasi(){
    var usernameMahasiswaAdmin = document.getElementById("usernameMahasiswaAdmin").value;
    var passwordMahasiswaAdmin = document.getElementById("passwordMahasiswaAdmin").value;
    var fileid2 = document.getElementById("fileid2").value;
    var nimMahasiswaAdmin = document.getElementById("nimMahasiswaAdmin").value;
    var namaMahasiswaAdmin = document.getElementById("namaMahasiswaAdmin").value;
    var tempatlahirMahasiswaAdmin = document.getElementById("tempatlahirMahasiswaAdmin").value;
    var alamatMahasiswaAdmin = document.getElementById("alamatMahasiswaAdmin").value;


    if(usernameMahasiswaAdmin==""){
        document.getElementById("usernameMahasiswaAdminBlank").innerHTML="*Masukkan Username";
    }

    else if(usernameMahasiswaAdmin!=""){
        document.getElementById("usernameMahasiswaAdminBlank").innerHTML="";
    }
    
    if(passwordMahasiswaAdmin==""){
        document.getElementById("passwordMahasiswaAdminBlank").innerHTML="*Masukkan Password";
    }

    else if(passwordMahasiswaAdmin!=""){
        document.getElementById("passwordMahasiswaAdminBlank").innerHTML="";
    }

    if(fileid2==""){
        document.getElementById("fileidMahasiswaAdminBlank").innerHTML="*Upload File Gambar";
    }

    else if(fileid2!=""){
        document.getElementById("fileidMahasiswaAdminBlank").innerHTML="";
    }


    if(nimMahasiswaAdmin==""){
        document.getElementById("nimMahasiswaAdminBlank").innerHTML="*Masukkan NIM";
    }

    else if(nimMahasiswaAdmin!=""){
        document.getElementById("nimMahasiswaAdminBlank").innerHTML="";
    }

    if(namaMahasiswaAdmin==""){
        document.getElementById("namaMahasiswaAdminBlank").innerHTML="*Masukkan Nama Mahasiswa";
    }

    else if(namaMahasiswaAdmin!=""){
        document.getElementById("namaMahasiswaAdminBlank").innerHTML="";
    }

    if(tempatlahirMahasiswaAdmin==""){
        document.getElementById("tempatlahirMahasiswaAdminBlank").innerHTML="*Masukkan Tempat Lahir Mahasiswa";
    }

    else if(tempatlahirMahasiswaAdmin!=""){
        document.getElementById("tempatlahirMahasiswaAdminBlank").innerHTML="";
    }

    if(alamatMahasiswaAdmin==""){
        document.getElementById("alamatMahasiswaAdminBlank").innerHTML="*Masukkan Alamat Mahasiswa";
    }

    else if(alamatMahasiswaAdmin!=""){
        document.getElementById("alamatMahasiswaAdminBlank").innerHTML="";
    }



}