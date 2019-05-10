Beasiswacharcountupdate('');

function Beasiswacharcountupdate(beasiswacount){
	var lng = beasiswacount.length;
	document.getElementById("charcount").innerHTML = lng + '/300';
}

$("#datepickerBatasTanggal").datepicker();

$( "#datepickerCari" ).datepicker({format: "yyyy/mm/dd"});


function checkValidationBeasiswa()
{
    var notValid = false;
    if($("#judulBeasiswa").val() == ""){
        notValid = true;
    }
    if($("#batasTanggal").val() == ""){
        notValid = true;
    }
    if($("#isiBeasiswa").val() == ""){
        notValid = true;
				}
				if($("#linkBeasiswa").val() == ""){
								notValid = true;
				}
    return notValid;
}

function Kirim() {
	if(checkValidationBeasiswa()){	
    $("#validShow").click();
	}else
				$("#realSubmitBeasiswa").click();
}


$("#adminCariBeasiswa").click(function() {
    var tanggal = $("#tanggalBeasiswa").val();

    $.ajax({
      url: "../process/proses_adminBeasiswa.php",
      method: "post",
      data: { adminCariBeasiswa: true, tanggal: tanggal },
      success: function(data) {
        $("#tabelBeasiswa").html(data);
      }
    });
  });
  