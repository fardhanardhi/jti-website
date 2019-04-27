$("#txtCariPekerjaan").keyup(function() {
  var input,
    filter,
		itemPekerjan,
		nip,
    namaDosen,
    namPekerjaan,
    i,
    txtValueNip,
    txtValueNamaDosen,
    txtValueNamaPekerjaan;
  input = $("#txtCariPekerjaan");
  filter = $(input)
    .val()
    .toUpperCase();
  itemPekerjan = $("#dataPekerjaan .itemPekerjaan");
  for (i = 0; i < itemPekerjan.length; i++) {
    nip = $(itemPekerjan[i]).find(".nip");
    namaDosen = $(itemPekerjan[i]).find(".nama-dosen");
    namPekerjaan = $(itemPekerjan[i]).find(".nama-pekerjaan");
    if (namaDosen || namPekerjaan || nip) {
      txtValueNip = $(nip)
        .text()
        .toUpperCase();
      txtValueNamaDosen = $(namaDosen)
        .text()
        .toUpperCase();
      txtValueNamaPekerjaan = $(namPekerjaan)
        .text()
        .toUpperCase();
      if (
        txtValueNamaDosen.indexOf(filter) > -1 ||
        txtValueNamaPekerjaan.indexOf(filter) > -1 ||
        txtValueNip.indexOf(filter) > -1
      ) {
        itemPekerjan[i].style.display = "";
      } else {
        itemPekerjan[i].style.display = "none";
      }
    }
  }
});

$("#txtCariKompen").keyup(function() {
  var input,
    filter,
		itemKompen,
		nim,
    namaDosen,
    namaMhs,
    prodi,
    waktu,
    i,
    txtValueNim,
    txtValueNamaDosen,
    txtValueNamaMhs,
    txtValueProdi,
    tctValueWaktu;
  input = $("#txtCariKompen");
  filter = $(input)
    .val()
    .toUpperCase();
  itemKompen = $("#dataKompen .itemKompen");
  for (i = 0; i < itemKompen.length; i++) {
    nim = $(itemKompen[i]).find(".nim");
    namaDosen = $(itemKompen[i]).find(".nama-dosen");
    namaMhs = $(itemKompen[i]).find(".nama-mhs");
    prodi = $(itemKompen[i]).find(".prodi");
    waktu = $(itemKompen[i]).find(".waktu");
    if (namaDosen || namaMhs || nim || prodi || waktu) {
      txtValueNim = $(nim)
        .text()
        .toUpperCase();
      txtValueNamaDosen = $(namaDosen)
        .text()
        .toUpperCase();
      txtValueNamaMhs = $(namaMhs)
        .text()
        .toUpperCase();
      txtValueProdi = $(prodi)
        .text()
        .toUpperCase();
      txtValueWaktu = $(waktu)
        .text()
        .toUpperCase();
      if (
        txtValueNamaDosen.indexOf(filter) > -1 ||
        txtValueNamaMhs.indexOf(filter) > -1 ||
        txtValueNim.indexOf(filter) > -1 ||
        txtValueProdi.indexOf(filter) > -1 ||
        txtValueWaktu.indexOf(filter) > -1
      ) {
        itemKompen[i].style.display = "";
      } else {
        itemKompen[i].style.display = "none";
      }
    }
  }
});

$("#txtCariRekap").keyup(function() {
  var input,
    filter,
		itemRekap,
		nim,
    kelas,
    i,
    txtValueNim,
    txtValueKelas;
  input = $("#txtCariRekap");
  filter = $(input)
    .val()
    .toUpperCase();
  itemRekap = $("#rekapKompen .itemRekap");
  for (i = 0; i < itemRekap.length; i++) {
    nim = $(itemRekap[i]).find(".nim");
    kelas = $(itemRekap[i]).find(".kelas");
    if (kelas || nim) {
      txtValueNim = $(nim)
        .text()
        .toUpperCase();
      txtValueKelas = $(kelas)
        .text()
        .toUpperCase();
      if (
        txtValueKelas.indexOf(filter) > -1 ||
        txtValueNim.indexOf(filter) > -1
      ) {
        itemRekap[i].style.display = "";
      } else {
        itemRekap[i].style.display = "none";
      }
    }
  }
});

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

