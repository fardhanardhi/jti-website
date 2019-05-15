Beritacharcountupdate('');

function Beritacharcountupdate(beritacount){
	var lng = beritacount.length;
	document.getElementById("Bercharcount").innerHTML = lng + '/500';
}

// KHS MODAL LIHAT
$(".detail-berita").click(function () {
	var id_info = $(this).attr("data-info");
	
	$.ajax({
	  url: "../process/proses_berita.php",
	  method: "post",
	  data: {
		tampilDetailInfo: id_info
	  },
	  success: function (data) {
		$("#Tampildetail-berita").html(data);
		$("#modalPreview").modal("show");
	  }
	});
  });

