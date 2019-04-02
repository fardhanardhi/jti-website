// $(".kompen-check")

$("input[type='checkbox']").change(function(){
    if($(this).is(":checked")){
        $('.labelCheck').addClass("fa-check-square");
        $('.labelCheck').removeClass("fa-square");

    }else {
        $('.labelCheck').addClass("fa-square");
        $('.labelCheck').removeClass("fa-check-square");
    }
});