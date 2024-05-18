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
                <h2>Thuê bao IP</h2>

                @include('ipu/thuebaoip/add_edit')
                @include('ipu/thuebaoip/list')

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
            function bind_jqxgrid_ipu_thuebaoip() {
                url = "/publicajaxipu/?task=get_thuebaoip";

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
                            data[i].mathoai = data[i].thu1 + '.' + data[i].thu2 + '.' + data[i].thu3 + '.' + data[i].thu4 + '.' + data[i].thu5;
                            data[i].text_nat = (data[i].nat == 1) ? 'Yes' : 'No';
                            data[i].text_isagent = (data[i].is_agent == 1) ? 'Yes' : 'No';
                            data[i].text_voicemail = (data[i].voicemail == 1) ? 'Yes' : 'No';
                        }

                        console.log(data);

                        var source = {
                            datatype: "json",
                            localdata: data // Sử dụng dữ liệu nhận được từ AJAX
                        };

                        var newAdapter = new $.jqx.dataAdapter(source);

                        // Khởi tạo jqxGrid với dữ liệu mới
                        $("#jqxgrid_ipu_thuebaoip").jqxGrid({
                            source: newAdapter,
                            width:880,
                            columns: [
                                { text: 'Số thuê bao', datafield: 'sothuebao', width: 150 },
                                { text: 'Tên thuê bao', datafield: 'tenthuebao', width: 150 },
                                { text: 'Dial plan', datafield: 'tendialplan', width: 150 },
                                { text: 'Chuẩn', datafield: 'baohieu', width: 250 },
                                { text: 'Mã thoại', datafield: 'mathoai', width: 150 },
                                { text: 'NAT', datafield: 'text_nat', width: 150 },
                                { text: 'DMTF Mode', datafield:'dtmf', width: 150 },
                                { text: 'In secure', datafield:'insecure', width: 150 },
                                { text: 'Can Reinvite', datafield:'canreinvete', width: 150 },
                                { text: 'Is Agent', datafield: 'text_isagent', width: 150 },
                                { text: 'Pick group', datafield:'pickgroup', width: 150 },
                                { text: 'Voice mail', datafield:'text_voicemail', width: 150 },
                            ]
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Gọi hàm khởi tạo
            bind_jqxgrid_ipu_thuebaoip();
            show_hide_form_button();


            $("#jqxgrid_ipu_thuebaoip").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#update_id").val(rowData.id);
                $("#sothuebao").val(rowData.sothuebao);
                $("#tenthuebao").val(rowData.tenthuebao);
                $("#id_dialplan").val(rowData.id_dialplan);
                $("#baohieu").val(rowData.baohieu);
                $("#matkhau").val(rowData.matkhau);

                $("#thu1").val(rowData.thu1);
                $("#thu2").val(rowData.thu2);
                $("#thu3").val(rowData.thu3);
                $("#thu4").val(rowData.thu4);
                $("#thu5").val(rowData.thu5);

                $("#dtmf").val(rowData.dtmf);
                $("#insecure").val(rowData.insecure);
                $("#canreinvete").val(rowData.canreinvete);
                $("#pickgroup").val(rowData.pickgroup);

                $("input[name='baohieu']").filter("[value='" + rowData.baohieu + "']").prop("checked", true);


                $('#add_edit_ipu_thuebaoip input[type="checkbox"]').prop('checked', false);
                // Mảng các ID checkbox mà bạn muốn đánh dấu là checked
                var checkedIds = [];
                if(rowData.nat == 1) {
                    checkedIds.push("nat");
                }
                if(rowData.isagent == 1) {
                    checkedIds.push("isagent");
                }
                if(rowData.voicemail == 1) {
                    checkedIds.push("voicemail");
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
                    $("#sothuebao").val("");
                    $("#tenthuebao").val("");
                    $("#matkhau").val("");

                    $('#add_edit_ipu_thuebaoip input[type="checkbox"]').prop('checked', false);
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

            function add_edit_thuebaoip_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: $("#add_edit_ipu_thuebaoip").serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_thuebaoip();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            function delete_thuebaoip_submit() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/admin/ajaxipu',
                    data: {
                        'task': 'delete_thuebaoip',
                        'delete_id': $("#update_id").val(),
                    },
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        alert(data.message);
                        bind_jqxgrid_ipu_thuebaoip();
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }

            $("#form_sua").click(function() {
                add_edit_thuebaoip_submit();
            });

            $("#form_them").click(function() {
                add_edit_thuebaoip_submit();
            });

            $("#form_xoa").click(function() {
                // Hiển thị confirm box
                var confirmation = confirm("Bạn có chắc chắn muốn thực hiện hành động này?");
                // Kiểm tra nếu người dùng nhấn OK trong confirm box
                if (confirmation) {
                    // Thực hiện hành động sau khi người dùng xác nhận
                    delete_thuebaoip_submit();
                }
            });


        });
    </script>


</body>

</html>
