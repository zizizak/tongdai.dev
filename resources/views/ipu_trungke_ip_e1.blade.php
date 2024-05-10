<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Khai bao bằng PO</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/jqwidgets/styles/jqx.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-pm.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ipu_style.css') }}">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/tippy-bundle.min.js') }}"></script>

    <script src="{{ asset('assets/jqwidgets/jqxcore.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxdata.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxbuttons.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxscrollbar.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxmenu.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxgrid.js') }}"></script>
    <script src="{{ asset('assets/jqwidgets/jqxgrid.selection.js') }}"></script>


</head>

<body class="antialiased">
    <div
        class="relative  items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @include('mainMenu')

            @include('ipu_menu')

            <div class="right-column right-column-ipu">
                <h2>Trung kế IP/E1</h2>

                <div class="tabs">
                    <ul class="tab-header">
                        <li data-tab="ip" class="active">Trung kế IP</li>
                        <li data-tab="e1">Trung kế E1</li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab active" id="ip">
                            @include('ipu/trungke/add_edit_IP')
                            @include('ipu/trungke/list_IP')
                        </div>
                        <div class="tab" id="e1">
                            @include('ipu/trungke/add_edit_E1')
                            @include('ipu/trungke/list_E1')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <style>
        .tab {
          display: none;
        }
        .tab.active {
            display: block;
        }

      </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tab-header li').on('click', function() {
                var tabID = $(this).data('tab');
                $('.tab-header li').removeClass('active');
                $(this).addClass('active');
                $('.tab').hide();
                $('#' + tabID).show();
            });

            // Code xử lý trung kế IP
            function bind_jqxgrid_ipu_trungke_ip() {
                var sothuebao = $("#tim_thuebao").val();
                url = "/publicajaxipu/?task=get_trungke_ip";

                // Sử dụng AJAX để lấy dữ liệu từ API
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {

                        var data = response.data;

                        // Kiểm tra nếu data không phải mảng
                        if (!Array.isArray(data)) {
                            console.error("Dữ liệu không phải mảng.");
                            return;
                        }

                        // Thêm cột Ma_hieu vào dữ liệu
                        for (var i = 0; i < data.length; i++) {
                            data[i].Ma_hieu = data[i].thu1 + '.' + data[i].thu2 + '.' + data[i].thu3 + '.' + data[i].thu4 + '.' + data[i].thu5;
                        }

                        var source = {
                            datatype: "json",
                            localdata: data // Sử dụng dữ liệu nhận được từ AJAX
                        };

                        var newAdapter = new $.jqx.dataAdapter(source);

                        // Khởi tạo jqxGrid với dữ liệu mới
                        $("#jqxgrid_ipu_trungke_ip").jqxGrid({
                            source: newAdapter,
                            width:900,
                            columns: [
                                { text: 'Tên trung kế', datafield: 'tentrungke', width: 150 },
                                { text: 'Địa chỉ kết nối', datafield: 'diachiketnoi', width: 150 },
                                { text: 'Tài khoản', datafield: 'taikhoan', width: 150 },
                                { text: 'Mã hiệu', datafield: 'Ma_hieu', width: 250 },
                                { text: 'Chuẩn', datafield: 'chuanbaohieu', width: 150 },
                                { text: 'Outbound Proxy', datafield: 'outboundproxy', width: 150 },
                                { text: 'Trạng thái', datafield: '', width: 150 }
                            ]
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Gọi hàm khởi tạo
            bind_jqxgrid_ipu_trungke_ip();
            show_hide_form_button();


            $("#jqxgrid_ipu_trungke_ip").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#trungke_ip_id").val(rowData.id);
                $("#tentrungke").val(rowData.tentrungke);
                $("#taikhoan").val(rowData.taikhoan);
                $("#diachiketnoi").val(rowData.diachiketnoi);
                $("#matkhau").val(rowData.matkhau);

                $("#thu1").val(rowData.thu1);
                $("#thu2").val(rowData.thu2);
                $("#thu3").val(rowData.thu3);
                $("#thu4").val(rowData.thu4);
                $("#thu5").val(rowData.thu5);

                $("input[name='chuanbaohieu']").filter("[value='" + rowData.chuanbaohieu + "']").prop("checked", true);
                $("input[name='outboundproxy']").filter("[value='" + rowData.outboundproxy + "']").prop("checked", true);

                show_hide_form_button();
                console.log(rowData);

            });

            $("input[name='rd_chedo']").change(function() {
                // Lấy giá trị của radio button được chọn
                var rd_chedo_selectedValue = $("input[name='rd_chedo']:checked").val();
                if(rd_chedo_selectedValue == "them") {
                    $("#trungke_ip_id").val(0);
                    $("#tentrungke").val("");
                    $("#taikhoan").val("");
                    $("#diachiketnoi").val("");
                    $("#matkhau").val("");
                }
                show_hide_form_button();
            });

            function show_hide_form_button(){
                var rd_chedo_selectedValue = $("input[name='rd_chedo']:checked").val();
                $("#form_them").hide();
                $("#form_xoa").hide();
                $("#form_sua").hide();
                if( $("#trungke_ip_id").val() > 0 && rd_chedo_selectedValue == 'xem_sua_xoa' ) {
                    $("#form_xoa").show();
                    $("#form_sua").show();
                }
                if( rd_chedo_selectedValue == 'them' ) {
                    $("#form_them").show();
                }
            }

            function add_edit_trungke_ip_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: $("#add_edit_ipu_trungke_ip").serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_trungke_ip();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            function delete_trungke_ip_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: {
                        'task': 'delete_trungke_ip',
                        'trungke_ip_id': $("#trungke_ip_id").val(),
                    },
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_trungke_ip();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            $("#form_sua").click(function() {
                add_edit_trungke_ip_submit();
            });

            $("#form_them").click(function() {
                add_edit_trungke_ip_submit();
            });

            $("#form_xoa").click(function() {
                // Hiển thị confirm box
                var confirmation = confirm("Bạn có chắc chắn muốn thực hiện hành động này?");
                // Kiểm tra nếu người dùng nhấn OK trong confirm box
                if (confirmation) {
                    // Thực hiện hành động sau khi người dùng xác nhận
                    delete_trungke_ip_submit();
                }
            });



            // Code xử lý trung kế E1
            function bind_jqxgrid_ipu_trungke_e1() {
                url = "/publicajaxipu/?task=get_trungke_e1";

                // Sử dụng AJAX để lấy dữ liệu từ API
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        var data = response.data;
                        // Kiểm tra nếu data không phải mảng
                        if (!Array.isArray(data)) {
                            console.error("Dữ liệu không phải mảng.");
                            return;
                        }
                        var source = {
                            datatype: "json",
                            localdata: data // Sử dụng dữ liệu nhận được từ AJAX
                        };

                        var newAdapter = new $.jqx.dataAdapter(source);

                        // Khởi tạo jqxGrid với dữ liệu mới
                        $("#jqxgrid_ipu_trungke_e1").jqxGrid({
                            source: newAdapter,
                            width:900,
                            columns: [
                                { text: 'Tên trung kế', datafield: 'tentrungke', width: 150 },
                                { text: 'ID Luồng', datafield: 'id_luong', width: 150 },
                                { text: 'Chiều gọi các kênh', datafield: 'chieugoicackenh', width: 150 },
                                { text: 'Báo hiệu', datafield: 'baohieu', width: 150 },
                            ]
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Gọi hàm khởi tạo
            bind_jqxgrid_ipu_trungke_e1();
            show_hide_form_button_e1();


            $("#jqxgrid_ipu_trungke_e1").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#trungke_e1_id").val(rowData.id);
                $("#tentrungke_e1").val(rowData.tentrungke);
                $("#id_luong").val(rowData.id_luong);
                $("#chieugoicackenh").val(rowData.chieugoicackenh);

                $("input[name='baohieu']").filter("[value='" + rowData.baohieu + "']").prop("checked", true);

                show_hide_form_button_e1();
                console.log(rowData);

            });

            $("input[name='rd_chedo_e1']").change(function() {
                // Lấy giá trị của radio button được chọn
                var rd_chedo_selectedValue = $("input[name='rd_chedo_e1']:checked").val();
                if(rd_chedo_selectedValue == "them") {
                    $("#trungke_e1_id").val(0);
                    $("#tentrungke").val("");
                    $("#taikhoan").val("");
                    $("#diachiketnoi").val("");
                    $("#matkhau").val("");
                }
                show_hide_form_button_e1();
            });

            function show_hide_form_button_e1(){
                var rd_chedo_selectedValue = $("input[name='rd_chedo_e1']:checked").val();
                $("#form_them_e1").hide();
                $("#form_xoa_e1").hide();
                $("#form_sua_e1").hide();
                if( $("#trungke_e1_id").val() > 0 && rd_chedo_selectedValue == 'xem_sua_xoa' ) {
                    $("#form_xoa_e1").show();
                    $("#form_sua_e1").show();
                }
                if( rd_chedo_selectedValue == 'them' ) {
                    $("#form_them_e1").show();
                }
            }

            function add_edit_trungke_e1_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: $("#add_edit_ipu_trungke_e1").serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_trungke_e1();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            function delete_trungke_e1_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: {
                        'task': 'delete_trungke_ip',
                        'trungke_ip_id': $("#trungke_e1_id").val(),
                    },
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_trungke_ip();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            $("#form_sua_e1").click(function() {
                add_edit_trungke_e1_submit();
            });

            $("#form_them_e1").click(function() {
                add_edit_trungke_e1_submit();
            });

            $("#form_xoa_e1").click(function() {
                // Hiển thị confirm box
                var confirmation = confirm("Bạn có chắc chắn muốn thực hiện hành động này?");
                // Kiểm tra nếu người dùng nhấn OK trong confirm box
                if (confirmation) {
                    // Thực hiện hành động sau khi người dùng xác nhận
                    delete_trungke_e1_submit();
                }
            });


        });
    </script>


</body>

</html>
