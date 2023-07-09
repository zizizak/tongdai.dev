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



    $(".open-modal").click(function(){
        var idx = $(this).attr('data-id');
        console.log(" Open id: " + idx);
        $("#" + idx).show();
    })


    $(".close-modal").click(function(){
        var idx = $(this).attr('data-id');
        console.log(" Close id: " + idx);
        $("#" + idx).hide();
    })



    $(".form-e1").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var modal_id = $(this).attr('data-modal-id');
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#" + modal_id).hide();
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })












});
