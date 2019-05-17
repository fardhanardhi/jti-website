$("#submitKompenDosen").click(function() {
    var idDosenKmpn = $("#idDsnSubmitKmpn").val();
    var idTaskKmpn = $("#idTask").val();

    $.ajax({
      url: "../process/proses_dosenHome.php",
      method: "post",
      data: { kompenDosenSumbit: true, idDosenKmpn: idDosenKmpn , idTaskKmpn: idTaskKmpn},
      success: function(data) {
        $("#kolomTask").html(data);
      }
    });
  });
  