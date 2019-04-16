$(document).ready(function(){
  $('.lihat-detail').click(function(){
    var id_dosen=$(this).attr("id");

    $.ajax({
      url:"../process/proses_kuisioner.php",
      method:"post",
      data:{namaDosen:id_dosen},
      success:function(data){
        $('#judul').html(data);
        $('#modalLihatHasil').modal("show");
      }
    })
  })
  
  $('#cariKuisionerDosen').click(function(){
    $.ajax({
      url:"../process/proses_kuisioner.php",
      method:"post",
      data:{id_dosen:$('#id_dosen').val(), kelas:$('#kelas').val(),tahun:$('#tahun').val(), semester:$('#semester').val()},
      success:function(data){
        $('#tableData').html(data);
        $('#modalLihatHasil').modal("show");
      }
    })
  })

  $(".modal").on("hidden.bs.modal", function(){
    $('#tableData').html(
      "<div><img src='../img/magnifier.svg' alt='pencarian' class='p-3'><p class='text-muted'>Data Tidak Ditemukan</p></div>"
    );
  })

})