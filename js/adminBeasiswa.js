Beasiswacharcountupdate('');

function Beasiswacharcountupdate(beasiswacount){
	var lng = beasiswacount.length;
	document.getElementById("charcount").innerHTML = lng + '/300';
}


$("#datepickerBatasTanggal").datepicker();


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

