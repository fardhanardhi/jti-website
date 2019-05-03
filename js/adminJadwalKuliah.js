$('.hapus-jadwal-kuliah').click(function () {
    var id_kelas = $(this).attr("id");
    var id_semester = $(this).attr("attrSemester");
    $('#id_kelasHapus').val(id_kelas);
    $('#id_semesterHapus').val(id_semester);
    $('#hapus').modal("show");
})