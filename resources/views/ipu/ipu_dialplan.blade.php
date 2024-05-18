<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Khai báo IPU</title>

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
                <h2>Khai báo Dialplan</h2>

                @include('ipu/dialplan/add_edit')
                @include('ipu/dialplan/list')

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

            // Code xử lý trung kế IP
            function bind_jqxgrid_ipu_dialplan() {
                url = "/publicajaxipu/?task=get_dialplan";

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
                            data[i].trangthai = "";
                            data[i].text_goinoidai = "Không";
                            if(data[i].goinoidai == '1') {
                                data[i].text_goinoidai = "Có";
                            }
                            data[i].text_goihangdoi = "Không";
                            if(data[i].goihangdoi == '1') {
                                data[i].text_goihangdoi = "Có";
                            }
                            data[i].text_goihoinghi = "Không";
                            if(data[i].goihoinghi == '1') {
                                data[i].text_goihoinghi = "Có";
                            }
                        }

                        console.log(data);

                        var source = {
                            datatype: "json",
                            localdata: data // Sử dụng dữ liệu nhận được từ AJAX
                        };

                        var newAdapter = new $.jqx.dataAdapter(source);

                        // Khởi tạo jqxGrid với dữ liệu mới
                        $("#jqxgrid_ipu_dialplan").jqxGrid({
                            source: newAdapter,
                            width:880,
                            columns: [
                                { text: 'Tên Dial Plan', datafield: 'tendialplan', width: 150 },
                                { text: 'Gọi nội đài', datafield: 'text_goinoidai', width: 150 },
                                { text: 'Gọi hàng đợi', datafield: 'text_goihangdoi', width: 150 },
                                { text: 'Gọi hội nghị', datafield: 'text_goihoinghi', width: 250 },
                                { text: 'Hướng gọi ra', datafield: 'ten_huonggoira', width: 150 },
                                { text: 'Trạng thái', datafield:'trangthai', width: 150 },
                            ]
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Gọi hàm khởi tạo
            bind_jqxgrid_ipu_dialplan();
            show_hide_form_button();


            $("#jqxgrid_ipu_dialplan").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#update_id").val(rowData.id);
                $("#tendialplan").val(rowData.tendialplan);
                $('#add_edit_ipu_dialplan input[type="checkbox"]').prop('checked', false);

                // Mảng các ID checkbox mà bạn muốn đánh dấu là checked
                var checkedIds = [];
                if(rowData.goinoidai == 1) {
                    checkedIds.push("goinoidai");
                }
                if(rowData.goihangdoi == 1) {
                    checkedIds.push("goihangdoi");
                }
                if(rowData.goihoinghi == 1) {
                    checkedIds.push("goihoinghi");
                }

                if(rowData.id_huonggoira && rowData.id_huonggoira.length > 0) {
                    var ar_tmp = rowData.id_huonggoira.split(',');
                    ar_tmp.forEach(function(id) {
                        checkedIds.push("id_huonggoira_" + id);
                    });
                }
                checkedIds.forEach(function(id) {
                    $('#' + id).prop('checked', true);
                });
                show_hide_form_button();
                console.log(rowData);

            });

            $("input[name='rd_chedo']").change(function() {
                // Lấy giá trị của radio button được chọn
                var rd_chedo_selectedValue = $("input[name='rd_chedo']:checked").val();
                if(rd_chedo_selectedValue == "them") {
                    $("#update_id").val(0);
                    $("#tendialplan").val("");
                    $('#add_edit_ipu_dialplan input[type="checkbox"]').prop('checked', false);
                }
                show_hide_form_button();
            });

            function show_hide_form_button(){
                var rd_chedo_selectedValue = $("input[name='rd_chedo']:checked").val();
                $("#form_them").hide();
                $("#form_xoa").hide();
                $("#form_sua").hide();
                if( $("#update_id").val() > 0 && rd_chedo_selectedValue == 'xem_sua_xoa' ) {
                    $("#form_xoa").show();
                    $("#form_sua").show();
                }
                if( rd_chedo_selectedValue == 'them' ) {
                    $("#form_them").show();
                }
            }

            function add_edit_dialplan_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: $("#add_edit_ipu_dialplan").serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_dialplan();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            function delete_dialplan_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: {
                        'task': 'delete_dialplan',
                        'delete_id': $("#update_id").val(),
                    },
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_dialplan();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            $("#form_sua").click(function() {
                add_edit_dialplan_submit();
            });

            $("#form_them").click(function() {
                add_edit_dialplan_submit();
            });

            $("#form_xoa").click(function() {
                // Hiển thị confirm box
                var confirmation = confirm("Bạn có chắc chắn muốn thực hiện hành động này?");
                // Kiểm tra nếu người dùng nhấn OK trong confirm box
                if (confirmation) {
                    // Thực hiện hành động sau khi người dùng xác nhận
                    delete_dialplan_submit();
                }
            });


        });
    </script>


</body>

</html>
