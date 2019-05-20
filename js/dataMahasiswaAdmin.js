

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
  

//   function showFilesSizesTambah() {
//     var input, file;
  
//     input = document.getElementById("fileid2");
  
//     file = input.files[0];
  
//     if (file.size > 1000000) {
//       document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "* Ukuran melebihi 1 MB";
//     } else if (file.size < 1000000) {
//       document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "";
//     }
//   }

  function preventDefaultAction(event){

        var input, file;

        input = document.getElementById("fileid2");

        file = input.files[0];

        if(file.size > 1000000){
            
            event = event || window.event;
            
            document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "*Ukuran melebihi 1 MB";

            if(event.preventDefault){
                event.preventDefault();
            }
            else{
                event.returnValue = false;
            }
        }

        else if(file.size < 1000000){
            document.getElementById("fileidMahasiswaAdminBlank").innerHTML = "";
        }
  }



//   function showFilesSizes2() {
//     var input, file;
  
//     input = document.getElementById("fileid3");
  
//     file = input.files[0];
  
//     if (file.size > 1000000) {
//       document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "* Ukuran melebihi 1 MB";
//     } else if (file.size < 1000000) {
//       document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "";
//     }
//   }

  function preventDefaultAction2(event){

    var input2, file2;

    input2 = document.getElementById("fileid3");

    file2 = input2.files[0];

    if(file2.size > 1000000){
        
        event = event || window.event;
        
        document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "*Ukuran melebihi 1 MB";

        if(event.preventDefault){
            event.preventDefault();
        }
        else{
            event.returnValue = false;
        }
    }

    else if(file.size < 1000000){
        document.getElementById("fileidMahasiswaAdminBlank2").innerHTML = "";
    }
}




  function validasi2(){
    var usernameMahasiswaAdmin2 = document.getElementById("usernameMahasiswaAdmin2").value;
    var passwordMahasiswaAdmin2 = document.getElementById("passwordMahasiswaAdmin2").value;
    
    var nimMahasiswaAdmin2 = document.getElementById("nimMahasiswaAdmin2").value;
    var namaMahasiswaAdmin2 = document.getElementById("namaMahasiswaAdmin2").value;
    var tempatlahirMahasiswaAdmin2 = document.getElementById("tempatlahirMahasiswaAdmin2").value;
    var alamatMahasiswaAdmin2 = document.getElementById("alamatMahasiswaAdmin2").value;

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

    else if(tempatlahirMahasiswaAdmin2!=""){
        document.getElementById("tempatlahirMahasiswaAdminBlank2").innerHTML="";
    }

    if(alamatMahasiswaAdmin2==""){
        document.getElementById("alamatMahasiswaAdminBlank2").innerHTML="*Masukkan Alamat Mahasiswa";
    }

    else if(alamatMahasiswaAdmin2!=""){
        document.getElementById("alamatMahasiswaAdminBlank2").innerHTML="";
    }


}

function ValidasiTambah(){
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


$('.hapus-mahasiswa-admin').click(function () {
    var id_user = $(this).attr("id_user");
    var id_mahasiswa = $(this).attr("id_mahasiswa");
    $('#id_userHapus').val(id_user);
    $('#id_mahasiswaHapus').val(id_mahasiswa);
    $('#hapus').modal("show");
})

$('.edit-mahasiswa-admin').click(function () {
    var id_userEdit = $(this).attr("id_userEdit");
    var id_mahasiswaEdit = $(this).attr("id_mahasiswaEdit");

    $.ajax({
        url: "../process/proses_adminMahasiswa.php",
        method: "post",
        data: {
          editMahasiswa_idUser: id_userEdit,
          editMahasiswa_idMahasiswa: id_mahasiswaEdit
        },
        success: function (data) {
          $("#id_userUpdate").val(id_userEdit);
          $("#id_mahasiswaUpdate").val(id_mahasiswaEdit);
          $("#edit-dataMahasiswa").html(data);
          $("#modalEditAdminMahasiswa").modal("show");
        }
      });
    });

$('#txtCariDataMahasiswa').keyup(function(){
var input,
    filter,
    itemDataMahasiswa,

    usernameMahasiswa,
    // passwordMahasiswa,
    // fotoMahasiswa,
    // nimMahasiswa,
    // namaMahasiswa,
    // tempatLahirMahasiswa,
    // tanggalLahirMahasiswa,
    // jenisKelaminMahasiswa,
    // alamatMahasiswa,
    // namaProdiMahasiswa,
    // kodeKelasMahasiswa,

    i,

    txtValueUsernameMahasiswa,
    txtValuePasswordMahasiswa,
    txtValueFotoMahasiswa,
    txtValueNimMahasiswa,
    txtValueNamaMahasiswa,
    txtValueTempatLahirMahasiswa,
    txtValueTanggalLahirMahasiswa,
    txtValueJenisKelaminMahasiswa,
    txtValueAlamatMahasiswa,
    txtValueNamaProdiMahasiswa,
    txtValueKodeKelasMahasiswa,

    totalInactive;

    input = $("#txtCariDataMahasiswa");

    filter = $(input)
    .val()
    .toUpperCase();

    itemDataMahasiswa = $("#dataAdminMahasiswa .itemDataMahasiswa");

    for(i=0; i < itemDataMahasiswa.length; i++){

        usernameMahasiswa = $(itemDataMahasiswa[i]).find(".usernameMahasiswa");
        passwordMahasiswa = $(itemDataMahasiswa[i]).find(".passwordMahasiswa");
        fotoMahasiswa = $(itemDataMahasiswa[i]).find(".fotoMahasiswa");
        nimMahasiswa = $(itemDataMahasiswa[i]).find(".nimMahasiswa");
        namaMahasiswa = $(itemDataMahasiswa[i]).find(".namaMahasiswa");
        tempatLahirMahasiswa = $(itemDataMahasiswa[i]).find(".tempatLahirMahasiswa");
        tanggalLahirMahasiswa = $(itemDataMahasiswa[i]).find(".tanggalLahirMahasiswa");
        jenisKelaminMahasiswa = $(itemDataMahasiswa[i]).find(".jenisKelaminMahasiswa");
        alamatMahasiswa = $(itemDataMahasiswa[i]).find(".alamatMahasiswa");
        namaProdiMahasiswa = $(itemDataMahasiswa[i]).find(".namaProdiMahasiswa");
        kodeKelasMahasiswa = $(itemDataMahasiswa[i]).find(".kodeKelasMahasiswa");

        // 

        if(usernameMahasiswa || passwordMahasiswa || fotoMahasiswa || nimMahasiswa || namaMahasiswa || tempatLahirMahasiswa || tanggalLahirMahasiswa || jenisKelaminMahasiswa || alamatMahasiswa || namaProdiMahasiswa || kodeKelasMahasiswa){

            txtValueUsernameMahasiswa = $(usernameMahasiswa)
                .text()
                .toUpperCase();

            txtValuePasswordMahasiswa = $(passwordMahasiswa)
                .text()
                .toUpperCase();

            txtValueFotoMahasiswa = $(fotoMahasiswa)
                .text()
                .toUpperCase();

            txtValueNimMahasiswa = $(nimMahasiswa)
                .text()
                .toUpperCase();

            txtValueNamaMahasiswa = $(namaMahasiswa)
                .text()
                .toUpperCase();

            txtValueTempatLahirMahasiswa = $(tempatLahirMahasiswa)
                .text()
                .toUpperCase();

            txtValueTanggalLahirMahasiswa = $(tanggalLahirMahasiswa)
                .text()
                .toUpperCase();

            txtValueJenisKelaminMahasiswa = $(jenisKelaminMahasiswa)
                .text()
                .toUpperCase();

            txtValueAlamatMahasiswa = $(alamatMahasiswa)
                .text()
                .toUpperCase();

            txtValueNamaProdiMahasiswa = $(namaProdiMahasiswa)
                .text()
                .toUpperCase();

            txtValueKodeKelasMahasiswa = $(kodeKelasMahasiswa)
                .text()
                .toUpperCase();

            // 

            if(txtValueUsernameMahasiswa.indexOf(filter) > -1 || txtValuePasswordMahasiswa.indexOf(filter) > -1 || txtValueFotoMahasiswa.indexOf(filter) > -1 || txtValueNimMahasiswa.indexOf(filter) > -1 ||txtValueNamaMahasiswa.indexOf(filter) > -1 ||txtValueTempatLahirMahasiswa.indexOf(filter) > -1 ||txtValueTanggalLahirMahasiswa.indexOf(filter) > -1 ||txtValueJenisKelaminMahasiswa.indexOf(filter) > -1 ||txtValueAlamatMahasiswa.indexOf(filter) > -1 ||txtValueNamaProdiMahasiswa.indexOf(filter) > -1 ||txtValueKodeKelasMahasiswa.indexOf(filter) > -1){

                itemDataMahasiswa[i].style.display = "";
            }

            else{

                itemDataMahasiswa[i].style.display = "none";

            }   
        }
    }

    totalInactive = $("#dataAdminMahasiswa .itemDataMahasiswa:hidden");

    if(itemDataMahasiswa.length == totalInactive.length){        
        document.getElementById("tidakDapatDitemukan").style.display = "block";
    }

    else{
        document.getElementById("tidakDapatDitemukan").style.display = "none";
    }
});