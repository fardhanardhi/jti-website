$('.hapus-krs').click(function(){
	var id_krs=$(this).attr("id");
	$('#id_krsHapus').val(id_krs);
	$('#modalHapus').modal("show");
})

$('.lihat-krs').click(function(){
	var id_krs=$(this).attr("id");

	$.ajax({
		url:"../process/proses_krsAdmin.php",
		method:"post",
		data:{lihat_krs:id_krs},
		success:function(data){
			$('#id_krsLihat').val(id_krs);
			$('#lihat-krs').html(data);
		}
	})
})