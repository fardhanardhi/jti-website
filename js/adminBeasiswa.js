function charcountupdate(str) {
	var lng = str.length;
	document.getElementById("charcount").innerHTML = lng + '/300';
}


function pageRefresh() {
	charcountupdate("");
  }

window.onload = function() {
	pageRefresh();
};

// $("#datepicker").datepicker();