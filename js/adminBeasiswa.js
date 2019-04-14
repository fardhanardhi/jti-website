function Beasiswacharcountupdate(beasiswacount){
	var lng = beasiswacount.length;
	document.getElementById("charcount").innerHTML = lng + '/300';
}

function pageRefresh() {
	Beasiswacharcountupdate("");
  }

window.onload = function() {
	pageRefresh();
};

// $("#datepicker").datepicker();