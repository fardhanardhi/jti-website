$('#cariKelasKosongMhs').click(function () {
    var radioHari = $("input[name='hari']:checked").val(),
        jam = $("#jamKelasKosong").val();

    $.ajax({
        url: "../process/proses_kelasKosong.php",
        method: "post",
        data: { cariKelasKosong: true, hari: radioHari, jam: jam },
        success: function (data) {
            $('#dataKelasKosongMhs').html(data);
        }
    })
})

$('.checkout-kelas').click(function () {
    var id_info_kelas_kosong = $(this).attr("id");
    $('#idInfoKelasKosong').val(id_info_kelas_kosong);
    $('#modalCheckout').modal("show");
})