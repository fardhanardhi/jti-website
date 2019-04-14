function Beritacharcountupdate(beritacount){
	var lng = beritacount.length;
	document.getElementById("Bercharcount").innerHTML = lng + '/500';
}

function pageRefresh() {
	Beritacharcountupdate("");
  }

window.onload = function() {
	pageRefresh();
};
