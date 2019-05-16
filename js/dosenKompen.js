$(".detail-kompen").click(function() {
    var id_kompen = $(this).attr("data-id");
  
    $.ajax({
      url: "../process/proses_dosenKompen.php",
      method: "post",
      data: { kompenDosen:true, id_kompen: id_kompen },
      success: function(data) {
        $("#kompen-dosen").html(data);
        $("#modalLihat").modal("show");
      }
    });
  });