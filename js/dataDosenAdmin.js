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
      var output = document.getElementById("fotoPrevDosenAdmin2");
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
    var filenyaModal = document.getElementById("filenyaModal").value;
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

    else if(filenyaModal!=""){
        document.getElementById("fileidDosenAdminBlank2").innerHTML="";
    }

    if(nimDosenAdmin2==""){
        document.getElementById("nimDosenAdminBlank2").innerHTML="*Masukkan NIP";
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

// $('.edit-dosen-admin').click(function () {
//     var id_userUpdate = $(this).attr("id_userUpdate");
//     var id_dosenUpdate = $(this).attr("id_dosenUpdate");
//     $('#id_userUpdate').val(id_userUpdate);
//     $('#id_dosenUpdate').val(id_dosenUpdate);
//     $('#editModal').modal("show");
// })
$('.edit-dosen-admin').click(function () {
    var id_userUpdate = $(this).attr("id_userUpdate");
    var id_dosenUpdate = $(this).attr("id_dosenUpdate");

    $.ajax({
        url: "../process/CRUD_dataDosen.php",
        method: "post",
        data: {
          editDosen_idUser: id_userUpdate,
          editDosen_idDosen: id_dosenUpdate
        },
        success: function (data) {
            $('#id_userEdit').val(id_userUpdate);
            $('#id_dosenEdit').val(id_dosenUpdate);
            $("#edit-dataDosen").html(data);
            $('#editModal').modal("show");
        }
    });
})

// edit modal
// $('.dosen-modal-edit').click(function () {
//     var id_userEdit = $(this).attr("id_userEdit");
//     var id_dosenEdit = $(this).attr("id_dosenEdit");

//     $.ajax({
//         url: "../process/CRUD_dataDosen.php",
//         method: "post",
//         data: {
//           editDosen_idUser: id_userEdit,
//           editDosen_idDosen: id_DosenEdit
//         },
//         success: function (data) {
//           $("#id_userUpdate").val(id_userEdit);
//           $("#id_dosenUpdate").val(id_dosenEdit);
//           $("#edit-dataDosen").html(data);
//           $("#modalEditAdminDosen").modal("show");
//         }
//       });
//     });

// search dosen
$('#txtCariDataDosen').keyup(function(){
    var input,
        filter,
        itemDataDosen,
    
        usernameDosen,
        passwordDosen,
        fotoDosen,
        nimDosen,
        namaDosen,
        tempatLahirDosen,
        tanggalLahirDosen,
        jenisKelaminDosen,
        alamatDosen,
        namaProdiDosen,
        kodeKelasDosen,
        i,
        txtValueUsernameDosen,
        txtValuePasswordDosen,
        txtValueFotoDosen,
        txtValueNimDosen,
        txtValueNamaDosen,
        txtValueTempatLahirDosen,
        txtValueTanggalLahirDosen,
        txtValueJenisKelaminDosen,
        txtValueAlamatDosen,
    
        totalInactive,
    
        // halamanTidakDitemukan = document.getElementById("tidakKetemu"),
        // tabelDataDosen = document.getElementById("dataAdminDosen");
    
        input = $("#txtCariDataDosen");
    
        filter = $(input)
        .val()
        .toUpperCase();
    
        itemDataDosen = $("#dataAdminDosen .itemDataDosen");
    
        for(i=0; i < itemDataDosen.length; i++){
            usernameDosen = $(itemDataDosen[i]).find(".usernameDosen");
            passwordDosen = $(itemDataDosen[i]).find(".passwordDosen");
            fotoDosen = $(itemDataDosen[i]).find(".fotoDosen");
            nimDosen = $(itemDataDosen[i]).find(".nimDosen");
            namaDosen = $(itemDataDosen[i]).find(".namaDosen");
            tempatLahirDosen = $(itemDataDosen[i]).find(".tempatLahirDosen");
            tanggalLahirDosen = $(itemDataDosen[i]).find(".tanggalLahirDosen");
            jenisKelaminDosen = $(itemDataDosen[i]).find(".jenisKelaminDosen");
            alamatDosen = $(itemDataDosen[i]).find(".alamatDosen");

            if(usernameDosen || passwordDosen || fotoDosen || nimDosen || namaDosen || tempatLahirDosen || tanggalLahirDosen || jenisKelaminDosen || alamatDosen){
                txtValueUsernameDosen = $(usernameDosen)
                    .text()
                    .toUpperCase();
                txtValuePasswordDosen = $(passwordDosen)
                    .text()
                    .toUpperCase();
                txtValueFotoDosen = $(fotoDosen)
                    .text()
                    .toUpperCase();
                txtValueNimDosen = $(nimDosen)
                    .text()
                    .toUpperCase();
                txtValueNamaDosen = $(namaDosen)
                    .text()
                    .toUpperCase();
                txtValueTempatLahirDosen = $(tempatLahirDosen)
                    .text()
                    .toUpperCase();
                txtValueTanggalLahirDosen = $(tanggalLahirDosen)
                    .text()
                    .toUpperCase();
                txtValueJenisKelaminDosen = $(jenisKelaminDosen)
                    .text()
                    .toUpperCase();
                txtValueAlamatDosen = $(alamatDosen)
                    .text()
                    .toUpperCase();
    
                if
                (
                    txtValueUsernameDosen.indexOf(filter) > -1 || 
                    txtValuePasswordDosen.indexOf(filter) > -1 || 
                    txtValueFotoDosen.indexOf(filter) > -1 || 
                    txtValueNimDosen.indexOf(filter) > -1 ||
                    txtValueNamaDosen.indexOf(filter) > -1 ||
                    txtValueTempatLahirDosen.indexOf(filter) > -1 ||
                    txtValueTanggalLahirDosen.indexOf(filter) > -1 ||
                    txtValueJenisKelaminDosen.indexOf(filter) > -1 ||
                    txtValueAlamatDosen.indexOf(filter) > -1
                )
                {
                    itemDataDosen[i].style.display = "";
                }
                else
                {
                    itemDataDosen[i].style.display = "none";
                }   
            }
        }
    
        totalInactive = $("#dataAdminDosen .itemDataDosen:hidden");
    
        if(itemDataDosen.length == totalInactive.length){
            document.getElementById("tidakKetemu").style.display = "block";
        }
    
        else{
            document.getElementById("tidakKetemu").style.display = "none";
        }
    });