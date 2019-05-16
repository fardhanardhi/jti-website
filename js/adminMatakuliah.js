$("#txtCariMatkul").keyup(function() {
    var input,
      filter,
      itemMatkul,
      nama,
      semester,
      sks,
      i,
      txtValueNama,
      txtValueSemester,
      txtValueSks,
      totalInactive;
    input = $("#txtCariMatkul");
    filter = $(input)
      .val()
      .toUpperCase();
    itemMatkul = $("#ruangan2 .itemMatkul");
    for (i = 0; i < itemMatkul.length; i++) {
      nama = $(itemMatkul[i]).find(".nama");
      semester = $(itemMatkul[i]).find(".semester");
      sks = $(itemMatkul[i]).find(".sks");
      if (semester || sks || nama) {
        txtValueNama = $(nama)
          .text()
          .toUpperCase();
        txtValueSemester = $(semester)
          .text()
          .toUpperCase();
        txtValueSks = $(sks)
          .text()
          .toUpperCase();
        if (
          txtValueSemester.indexOf(filter) > -1 ||
          txtValueSks.indexOf(filter) > -1 ||
          txtValueNama.indexOf(filter) > -1
        ) {
          itemMatkul[i].style.display = "";
        } else {
          itemMatkul[i].style.display = "none";
        }
      }
    }
    totalInactive = $("#ruangan2 .itemMatkul:hidden");
  
    if (itemMatkul.length == totalInactive.length) {
      document.getElementById("matkulTidakDitemukan").style.display = "block";
    } else {
      document.getElementById("matkulTidakDitemukan").style.display = "none";
    }
  });

$(".hapus-matkul").click(function() {
    var id_matkul = $(this).attr("id");
    $("#id_matkulHapus").val(id_matkul);
    $("#modalHapusMatakuliah").modal("show");
  });