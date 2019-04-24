function validasiTanggal(input) {
	if (input.value == "") {
		document.getElementById('peringatanTanggal').classList.remove('d-none');
		input.classList.add('border-danger');
		return false;
	} else {
		document.getElementById('peringatanTanggal').classList.add('d-none');
		input.classList.remove('border-danger');
		return true;
	}
}

function validasiJenis(input) {
	if (input.value == "") {
		document.getElementById('peringatanJenis').classList.remove('d-none');
		input.classList.add('border-danger');
		return false;
	} else {
		document.getElementById('peringatanJenis').classList.add('d-none');
		input.classList.remove('border-danger');
		return true;
	}
}

function validasiJenis(input) {
	if (input.value == "") {
		document.getElementById('peringatanJenis').classList.remove('d-none');
		input.classList.add('border-danger');
		return false;
	} else {
		document.getElementById('peringatanJenis').classList.add('d-none');
		input.classList.remove('border-danger');
		return true;
	}
}

function validasiJam(input) {
	if (input.value == "" || input.value == 0) {
		document.getElementById('peringatanJam').classList.remove('d-none');
		input.classList.add('border-danger');
		return false;
	} else {
		document.getElementById('peringatanJam').classList.add('d-none');
		input.classList.remove('border-danger');
		return true;
	}
}

function validasiDosen(input) {
	if (input.value == "") {
		document.getElementById('peringatanDosen').classList.remove('d-none');
		input.classList.add('border-danger');
		return false;
	} else {
		document.getElementById('peringatanDosen').classList.add('d-none');
		input.classList.remove('border-danger');
		return true;
	}
}

function validasiSubmitEditKompen() {
	if (validasiTanggal(document.getElementById('tanggal')) == false) {
		return false;
	}
	if (validasiJenis(document.getElementById('jenisKompensasi')) == false) {
		return false;
	}
	if (validasiJam(document.getElementById('totalJam')) == false) {
		return false;
	}
	if (validasiDosen(document.getElementById('dosen')) == false) {
		return false;
	}
	return true;
}

$('.tampil-detail').click(function(){
	var id_kompen=$(this).attr("data-id");
	
		$.ajax({
		  url:"../process/proses_absenKompen.php",
		  method:"post",
			data:{tampilDetail:id_kompen},
			success:function(data){
				$('#detail-kompen').html(data);
        $('#modalPreview').modal("show");
      }
		})
})

$('.submit-absen').click(function(){
	var id_absen=$(this).attr("id");

	$.ajax({
		url:"../process/proses_absenKompen.php",
		method:"post",
    data:{
      submitAbsen:id_absen, sakit: $("input[id='sakit"+id_absen+"']").val(), ijin: $("input[id='ijin"+id_absen+"']").val(), alpa: $("input[id='alpa"+id_absen+"']").val() 
      },
    success:function(data){
			alert("Absensi berhasil disimpan");
			location.reload();
    }
	})
})

$('.edit-kompen').click(function(){
	var id_kompen=$(this).attr("id");

	$.ajax({
		url:"../process/proses_absenKompen.php",
		method:"post",
		data:{edit_kompen:id_kompen},
		success:function(data){
			$('#id_kompenEdit').val(id_kompen);
			$('#edit-kompen').html(data);
		}
	})
})

$('.hapus-kompen').click(function(){
	var id_kompen=$(this).attr("id");
	$('#id_kompenHapus').val(id_kompen);
	$('#modalHapusKompen').modal("show");
})

$('#modalEditKompen').on('change', 'select[name="dosen"]', function() {
  var id_dosen = $(this).val();

  $.ajax({
    type: "POST",
    url: "../process/proses_absenKompen.php",
    data: {pilihDosen : id_dosen, id_semester:$('#id_semesterPekerjaan').val() },
    success: function (data) {
      $('select[name="jenisKompensasi"]').prop("disabled", false);
      $('select[name="jenisKompensasi"]').html(data);      
    }
  });
});

