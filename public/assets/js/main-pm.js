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


        //if(idx == "modal-cauhinhluongE1") loadformE1();
        if(idx == "modal-thamsothuebao") {
            var card_id = $(this).attr('data-card-id');
            console.log(card_id);
            loadThamsothuebao(card_id, 1);
        }
        if(idx == "modal-thamsotrungke") {
            loadTrungkeCO(1);
        }
        if(idx == "modal-khaibaothuebao") {
            loadKhaibaoThuebao();
        }

        if(idx == "modal-khaibaoclass") {
            loadKhaibaoClass(1);
        }

        if(idx == "modal-khaibaohuong") {
            loadHuong(1);
            loadMaHuong(1);
        }

        if(idx == "modal-bangsoquay") {
            loadBangsoquay(1);
        }


        //Display modal
        $("#" + idx).show();

    })



    function loadThamsothuebao(card_id, resetForm){
        if(resetForm == 1) {
            $("#tb_dangchon_text").html("Chưa chọn thuê bao");
            $("#tstb_id").val(0);
        }

        url = "/publicajax/?task=getThuebao&card=" + card_id;
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        //$("#jqxgridThuebao").jqxGrid({source: newAdapter});

        $("#jqxgridThuebao").jqxGrid(
            {
                source: newAdapter,
                columns: [
                  { text: 'cards', datafield: 'card', width: 100 },
                  { text: 'STT T.bao', datafield: 'thuebao_id', width: 100 },
                  { text: 'Số danh bạ', datafield: 'socuoi', width: 100 },
                ]
            });
    }

    $("#form-thamsothuebao").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var modal_id = $(this).attr('data-modal-id');
        var card_id = $("#card").val();
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadThamsothuebao(card_id, 0);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })


    function loadTrungkeCO(resetForm){
        if(resetForm == 1) {
            $("#thamsotrungke_id").val(0);
            $("#tke_dangchon_text").html("Chưa chọn trung kế");
        }

        url = "/publicajax/?task=getTrungkeCO";
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        //$("#jqxgridThuebao").jqxGrid({source: newAdapter});

        $("#jqxgridTrungke").jqxGrid(
            {
                source: newAdapter,
                columns: [
                  { text: 'cards', datafield: 'card', width: 100 },
                  { text: 'STT T.Kế', datafield: 'id_stt', width: 100 },
                ]
            });
    }

    $("#form-thamsotrungkeCO").submit(function(){
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
                //alert("Cập nhật thành công");
                loadTrungkeCO(0);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })

    function loadKhaibaoThuebao(){
        $.ajax({
            type: 'get',
            url: '/publicajax',
            data: { 'task': 'getKhaibaoThuebao' },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                dataRow = data.data;

                $("#prefix").val(dataRow.prefix);
                $("#sobatdau").val(dataRow.sobatdau);
                $("#khaibaothuebao_id").val(dataRow.id);

            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    $("#form-Khaibaothuebao").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                bindDanhba();
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })



    var cellsrendererKhaibaoClassQuyen = function (row, columnfield, value, defaulthtml, columnproperties) {
        if (value == 1) {
            return '<div class="jqx-grid-cell-left-align" style="margin-top: 8.5px;">Cho phép</div>';
        }
        else {
            return '<div class="jqx-grid-cell-left-align" style="margin-top: 8.5px;">Cấm</div>';
        }
    }


    function loadKhaibaoClass(resetForm){
        if(resetForm == 1) {
            //$("#thamsotrungke_id").val(0);
            //$("#tke_dangchon_text").html("Chưa chọn trung kế");
        }

        var idClass = $("#khaibaoClass_id_class").val();

        url = "/publicajax/?task=getKhaibaoClass&idClass=" + idClass;
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgridClass").jqxGrid(
            {
                source: newAdapter,
                columns: [
                    { text: 'ID', datafield: 'id', width: 100 },
                    { text: 'Digits', datafield: 'digits', width: 100 },
                    { text: 'Quyền', datafield: 'quyen', width: 100, cellsrenderer: cellsrendererKhaibaoClassQuyen },
                ]
            });
    }

    $("#khaibaoClass_id_class").change(function(){
        $("#khaibao_class_id_class_update").val( $("#khaibaoClass_id_class").val());
        loadKhaibaoClass(1);
    })

    $("#form-KhaibaoClass").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadKhaibaoClass(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })


    $("#khaibaoClass_xoa").click(function(){
        var id_delelte = $("#khaibaoClass_xoa_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'delKhaibaoThuebao', 'id': id_delelte },
            dataType: 'json',
            success: function (data) {
                loadKhaibaoClass(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })


    $("#khaibaoClass_xoa_toanbo").click(function(){
        var class_id = $("#khaibaoClass_id_class").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'delAllKhaibaoThuebao', 'class_id': class_id },
            dataType: 'json',
            success: function (data) {
                loadKhaibaoClass(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })



    function loadHuong(resetForm){
        if(resetForm == 1) {
            //$("#thamsotrungke_id").val(0);
            //$("#tke_dangchon_text").html("Chưa chọn trung kế");
        }

        url = "/publicajax/?task=getHuong";
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgridHuong").jqxGrid(
            {
                source: newAdapter,
                columns: [
                    { text: 'ID', datafield: 'huong_id', width: 100 },
                    { text: 'Loai', datafield: 'loai', width: 100 },
                    { text: 'Thanhphan', datafield: 'thanhphan', width: 100 },
                  ]
            });

        bindMahuong_huong();
    }

    function bindMahuong_huong(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            type: 'post',
            url: '/publicajax/?task=getHuong',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log('bindMahuong_huong');
                console.log(data);
                var rowData = data.data;
                var str_options = '';
                for (let i = 0; i < rowData.length; i++) {
                    str_options += '<option value="' + rowData[i].huong_id + '">' + rowData[i].huong_id + '</option>';
                }
                $("#Mahuong_huong").html(str_options);

            },
            error: function (data) {
                console.log(data);
            }
        });

    }



    ///form-Khaibaohuong
    $("#form-Khaibaohuong").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var check_dkx = $("#thanhphan_dkx").prop("checked");
        var check_e1 = $("#thanhphan_E1").prop("checked");
        if(check_dkx) {
            $("#khaibaoHHuong_thanhphan").val($("#thanhphan_dkx_giatri").val());
            $("#khaibaoHHuong_loai_thanhphan").val(0);
        }
        if(check_e1) {
            $("#khaibaoHHuong_thanhphan").val($("#thanhphan_E1_giatri").val());
            $("#khaibaoHHuong_loai_thanhphan").val(1);
        }

        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadHuong(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })


    $("#khaibaoHuong_xoa").click(function(){
        var id_delelte = $("#khaibaoHuong_xoa_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'delKhaibaoHuong', 'id': id_delelte },
            dataType: 'json',
            success: function (data) {
                loadHuong(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })



    function loadMaHuong(resetForm){
        if(resetForm == 1) {
            //$("#thamsotrungke_id").val(0);
            //$("#tke_dangchon_text").html("Chưa chọn trung kế");
        }

        url = "/publicajax/?task=getMaHuong";
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgridMaHuong").jqxGrid(
            {
                source: newAdapter,
                columns: [
                    { text: 'ID', datafield: 'mahuong_id', width: 50 },
                    { text: 'maHuong', datafield: 'mahuong_dinhtuyen', width: 70 },
                    { text: 'SoChan', datafield: 'sochan', width: 70 },
                    { text: 'SoQuayT', datafield: 'min_soquay', width: 70 },
                    { text: 'Huong', datafield: 'huong_id', width: 70 },
                  ]
            });

    }

    $("#form-mahuong").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadMaHuong(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })

    $("#Mahuong_xoa").click(function(){
        var id_delelte = $("#Mahuong_xoa_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'delMaHuong', 'id': id_delelte },
            dataType: 'json',
            success: function (data) {
                loadMaHuong(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })


    function loadBangsoquay(resetForm){
        if(resetForm == 1) {
            //$("#thamsotrungke_id").val(0);
            //$("#tke_dangchon_text").html("Chưa chọn trung kế");
        }

        url = "/publicajax/?task=getBangsoquay";
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgridBangsoquay").jqxGrid(
            {
                source: newAdapter,
                columns: [
                    { text: 'ID', datafield: 'id', width: 100 },
                    { text: 'Đầu số', datafield: 'dauso', width: 100 },
                    { text: 'Số Digit', datafield: 'so_digits', width: 100 },
                  ]
            });

    }


    $("#form-bangsoquay").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadBangsoquay(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
    })

    $("#bangsoquay_xoa").click(function(){
        var id_delelte = $("#bangsoquay_xoa_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'delBangsoquay', 'id': id_delelte },
            dataType: 'json',
            success: function (data) {
                loadBangsoquay(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
    })





    function bindDanhba(sothuebao) {
        var sothuebao = $("#tim_thuebao").val();
        url = "/publicajax/?task=getDanhba&sothuebao=" + sothuebao;
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgrid_DS_SoDB").jqxGrid(
            {
                source: newAdapter,
                width:230,
                columns: [
                  { text: 'cards', datafield: 'card', width: 50 },
                  { text: 'STT T.bao', datafield: 'thuebao_id', width: 75 },
                  { text: 'Số danh bạ', datafield: 'sodienthoai', width: 100 },
                ]
            });
    }

    $("#btn_timSDB").click(function(){
        var sothuebao = $("#tim_thuebao").val();
        url = "/publicajax/?task=getDanhba&sothuebao=" + sothuebao;
        var source =
        {
            datatype: "json",
            url: url
        };
        var newAdapter = new $.jqx.dataAdapter(source, {
            downloadComplete: function (data, status, xhr) { },
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });

        $("#jqxgrid_DS_SoDB").jqxGrid(
            {
                source: newAdapter,
                width:230,
                columns: [
                  { text: 'cards', datafield: 'card', width: 50 },
                  { text: 'STT T.bao', datafield: 'thuebao_id', width: 75 },
                  { text: 'Số danh bạ', datafield: 'sodienthoai', width: 100 },
                ]
            });
    })


    $("#form-thaydoiSDB").submit(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                //loadBangsoquay(1);
            },
            error: function (data) {
                console.log(data);
            }
        });
        return false;
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

    /** All Ajax function */
    function loadformE1() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/ajax',
            data: { 'task': 'getTrungkeE1' },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#" + modal_id).hide();
            },
            error: function (data) {
                console.log(data);
            }
        });
    }


    //Default load

    bindDanhba();








});
