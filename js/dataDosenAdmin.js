function eror(){
    var usernameDosenAdmin = document.getElementById("usernameDosenAdmin").value;
    var passwordDosenAdmin = document.getElementById("passwordDosenAdmin").value;
    var filenya = document.getElementById("filenya").value;
    var nimDosenAdmin = document.getElementById("nimDosenAdmin").value;
    var namaDosenAdmin = document.getElementById("namaDosenAdmin").value;
    var tempatlahirDosenAdmin = document.getElementById("tempatlahirDosenAdmin").value;
    var alamatDosenAdmin = document.getElementById("alamatDosenAdmin").value;
    
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

    if(filenya==""){
        document.getElementById("fileidDosenAdminBlank").innerHTML="*Upload File Gambar";
    }

    else if(filenya!=""){
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
}

function setupDosen() 
{
    document.getElementById('tombolid').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('filenya').click();
    }
}

function setupDosenModal() 
{
    document.getElementById('tombolidModal').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('filenyaModal').click();
    }
}

function preview_images(event) 
{
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevDosenAdmin");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function preview_imagesModal(event) 
{
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevDosenAdmin");
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function showFilesSizes() 
{
    var input, file;

    input = document.getElementById("fileid");

    file = input.files[0];

    if (file.size > 1000000) {
        document.getElementById("fileidDosenAdminBlank").innerHTML = "* Ukuran melebihi 1 MB";
    } 
    else if (file.size < 1000000) {
        document.getElementById("fileidDosenAdminBlank").innerHTML = "";
    }
}

function showFilesSizesModal() 
{
    var input, file;

    input = document.getElementById("fileid");

    file = input.files[0];

    if (file.size > 1000000) {
        document.getElementById("fileidDosenAdminBlank").innerHTML = "* Ukuran melebihi 1 MB";
    } 
    else if (file.size < 1000000) {
        document.getElementById("fileidDosenAdminBlank").innerHTML = "";
    }
}

function erorModal(){
    var usernameDosenAdmin2 = document.getElementById("usernameDosenAdmin2").value;
    var passwordDosenAdmin2 = document.getElementById("passwordDosenAdmin2").value;
    var fileid3 = document.getElementById("fileid3").value;
    var nimDosenAdmin2 = document.getElementById("nimDosenAdmin2").value;
    var namaDosenAdmin2 = document.getElementById("namaDosenAdmin2").value;
    var tempatlahirDosenAdmin2 = document.getElementById("tempatlahirDosenAdmin2").value;
    var alamatDosenAdmin2 = document.getElementById("alamatDosenAdmin2").value;

    if(usernameDosenAdmin2==""){
        document.getElementById("usernameDosenAdminBlank2").innerHTML="*Masukkan Username";
    }

    else if(usernameDosenAdmin2!=""){
        document.getElementById("usernameDosenAdminBlank2").innerHTML="";
    }

    if(passwordDosenAdmin2==""){
        document.getElementById("passwordDosenAdminBlank2").innerHTML="*Masukkan Password";
    }

    else if(passwordDosenAdmin2!=""){
        document.getElementById("passwordDosenAdminBlank2").innerHTML="";
    }
    
    if(filenyaModal==""){
        document.getElementById("fileidDosenAdminBlank2").innerHTML="*Upload File Gambar";
    }

    else if(fileid3!=""){
        document.getElementById("fileidDosenAdminBlank2").innerHTML="";
    }

    if(nimDosenAdmin2==""){
        document.getElementById("nimDosenAdminBlank2").innerHTML="*Masukkan NIM";
    }

    else if(nimDosenAdmin2!=""){
        document.getElementById("nimDosenAdminBlank2").innerHTML="";
    }

    
    if(namaDosenAdmin2==""){
        document.getElementById("namaDosenAdminBlank2").innerHTML="*Masukkan Nama Dosen";
    }

    else if(namaDosenAdmin2!=""){
        document.getElementById("namaDosenAdminBlank2").innerHTML="";
    }

     
    if(tempatlahirDosenAdmin2==""){
        document.getElementById("tempatlahirDosenAdminBlank2").innerHTML="*Masukkan Tempat Lahir Dosen";
    }

    else if(tempatlahirDosenAdmin2!=""){
        document.getElementById("tempatlahirDosenAdminBlank2").innerHTML="";
    }

    if(alamatDosenAdmin2==""){
        document.getElementById("alamatDosenAdminBlank2").innerHTML="*Masukkan Alamat Dosen";
    }

    else if(alamatDosenAdmin2!=""){
        document.getElementById("alamatDosenAdminBlank2").innerHTML="";
    }


}

$('.hapus-dosen-admin').click(function () {
    var id_userDosen = $(this).attr("id_user");
    var id_dosenDosen = $(this).attr("id_dosen");
    $('#id_userDosenHapus').val(id_userDosen);
    $('#id_dosenDosenHapus').val(id_dosenDosen);
    $('#hapus').modal("show");
})