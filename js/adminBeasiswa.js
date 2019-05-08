Beasiswacharcountupdate('');

function Beasiswacharcountupdate(beasiswacount){
	var lng = beasiswacount.length;
	document.getElementById("charcount").innerHTML = lng + '/300';
}


$("#datepickerBatasTanggal").datepicker();


function checkValidationBeasiswa()
{
    var notValid = false;
    if($("#judulBeasiswa").val() == null){
        notValid = true;
    }
    if($("#batasTanggal").val() == null){
        notValid = true;
    }
    if($("#isiBeasiswa").val() == null){
        notValid = true;
				}
				if($("#linkBeasiswa").val() == null){
								notValid = true;
				}
    return notValid;
}

function Kirim() {
	if(checkValidationBeasiswa()){	
    $("#validShow").click();
	}else
    alert("Form is not valid");
}

