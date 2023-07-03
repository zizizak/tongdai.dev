jQuery(document).ready(function($){

    //alert("OK");

    $(".tab-nav a").click(function(){
        var data_id = $(this).attr('data-id');
        $(".tab-nav li").removeClass('active');
        $(this).parent().addClass('active');

        $(".tab-content-wrap .tab-content").removeClass("active");
        $(".tab-content-wrap #" + data_id ).addClass("active");
        return false;
    })

});
