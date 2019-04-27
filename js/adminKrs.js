$('.hapus-krs').click(function(){
	var id_krs=$(this).attr("id");
	$('#id_krsHapus').val(id_krs);
	$('#modalHapus').modal("show");
})