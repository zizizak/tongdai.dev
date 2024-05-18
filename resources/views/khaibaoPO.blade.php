<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Khai bao bằng PO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main-pm.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/tippy-bundle.min.js') }}"></script>


    </head>
    <body class="antialiased">
        <div class="relative  items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

                @include('mainMenu')

                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2 style="margin:10px 300PX;"class="title">THỰC HÀNH KHAI BÁO BẰNG MÁY TRỰC PO</h2>
                </div>



                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="width:100%; margin:0;padding:0px 0; text-align:center;">
                    <div class="grid grid-cols-1 md:grid-cols-1" style="padding:20px;">
                        <div class="tong-dai-top">
                            <form method="get">
                                <div>
                                    <span style="color: red;">Cấu hình hiện thời: <?php echo $cauhinh_active_real ?></span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style="margin-left:100px;">
                                        <select name="cauhinh_active" style="border:1px solid #ccc;padding:5px 10px">
                                            <option value="0" <?php echo ($cauhinh_active_real == 0) ? 'selected="selected"' : ''; ?> >0</option>
                                            <option value="1" <?php echo ($cauhinh_active_real == 1) ? 'selected="selected"' : ''; ?> >1</option>
                                            <option value="2" <?php echo ($cauhinh_active_real == 2) ? 'selected="selected"' : ''; ?> >2</option>
                                        </select>
                                    </span>
                                    <span>
                                        <input  type="radio" name="cauhinh_type" checked="checked" value="kichhoat"/> Kích hoạt
                                    </span>
                                    <span>
                                        <input type="submit" value="OK" style="border:1px solid #ccc;padding:5px 10px" />
                                    </span>

                                </div>
                            </form>
                        </div>

                        <div>
                                <div style="width:50%; float:left;">

                                    <h4 style="margin-bottom:0px; margin-top:20px;">Tổng đài 1: <span id="tong-dai-1-text">{{ $thuebao_1->sodienthoai }}</span> </h4>
                                    <div id="po-output-wrap">
                                        <br/>
                                        <div>
                                            <div class="anh-tong-dai-po" style="background:#fff;width:100%;height:auto;margin:-20px auto 0; position: relative;overflow:hidden;">
                                                <img src="/storage/images/anh-tong-dai-PO.jpg" class="img img-100" />
                                                <input type="text" id="po-output" name="po-output"  value="0000"  disabled />
                                            </div>
                                        </div>

                                        <div class="phone-list phone-list-td-1">
                                            <div class="phone-item">
                                                <a href="javascript:void(0)" id="td-1-phone-2" data-phone-number="{{ $thuebao_2->sodienthoai }}" data-phone-td="1" data-phone-stt="2">
                                                <img src="/storage/images/phone.png" class="img img-100" />
                                                    TB2: <span class="phone-number-text">{{ $thuebao_2->sodienthoai }}</span>
                                                </a>
                                            </div>
                                            <div class="phone-item">
                                                <a href="javascript:void(0)" id="td-1-phone-3"  data-phone-number="{{ $thuebao_3->sodienthoai }}" data-phone-td="1" data-phone-stt="3">
                                                <img src="/storage/images/phone.png" class="img img-100" />
                                                    TB3: <span class="phone-number-text">{{ $thuebao_3->sodienthoai }}</span>
                                                </a>
                                            </div>
                                            <div class="phone-item">
                                                <a href="javascript:void(0)" id="td-1-phone-po" data-phone-number="{{ $thuebao_1->sodienthoai }}" data-phone-td="1" data-phone-stt="1">
                                                <img src="/storage/images/phone.png" class="img img-100" />
                                                    PO1: <span class="phone-number-text">{{ $thuebao_1->sodienthoai }}</span>
                                                </a>
                                            </div>
                                            <div class="clear clearfix"></div>
                                        </div>



                                    </div>
                                    <div id="po-input-wrap" style="display: none;" >
                                        <h4 style="margin-bottom:5px;">Nhập chuỗi khai báo PO </h4>
                                        <input type="text" id="po-input" name="po-input"  style="width:200px;font-size:24px;border:1px solid #ccc;text-align:center;" placeholder="*60*01#" />
                                    </div>
                                </div>
                                <div style="width:50%; float:left;">
                                        <h4 style="margin-bottom:24px; margin-top:20px;">Tổng đài 2: 659100 </h4>
                                        <div class="anh-tong-dai-po" style="background:#fff;width:100%;height:auto;margin:-20px auto 0; position: relative;overflow:hidden;">
                                            <img src="/storage/images/anh-tong-dai-PO.jpg" class="img img-100" />
                                        </div>
                                        <div class="phone-list phone-list-td-2">
                                            <div class="phone-item">
                                                <a href="javascript:void(0)" id="td-2-phone-po" data-phone-number="659100" data-phone-td="2" data-phone-stt="1">
                                                <img src="/storage/images/phone.png" class="img img-100" />
                                                    PO1: <span class="phone-number-text">659100</span>
                                                </a>
                                            </div>
                                            <div class="clear clearfix"></div>
                                        </div>
                                </div>
                                <div class="clear clearfix"></div>
                        </div>

                        <div class="keyboard-wrap">
                            <div class="btn-group-vertical ml-4 mt-4" id="keyboard">
                                <span class="close close-keyboard">x</span>
                                <div class="btn-group">
                                    <h3 id="active-phone">PO1</h3>
                                    <input type="hidden" id="active_phone_number" value=""/>
                                    <input type="hidden" id="active_tong_dai" value=""/>
                                    <input type="hidden" id="active_stt" value=""/>
                                    <input class="text-center form-control-lg mb-2 keyboard-output" id="code" autocomplete="off" >
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '1';">1</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '2';">2</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '3';">3</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '4';">4</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '5';">5</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '6';">6</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '7';">7</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '8';">8</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '9';">9</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '*';">*</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '0';">0</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" id="enter-cmd" onclick="document.getElementById('code').value=document.getElementById('code').value + '#';">#</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value = '';">C</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value.slice(0, -1);">&lt;</button>
                                    <button type="button" class="btn btn-outline-secondary py-3" id="action-call">Go</button>
                                </div>

                                <div>
                                    <p style="margin-bottom:0">CMD output: <span id="po-output-text" style="color:red; font-style:italic;">...</span> </p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                       Đơn vị:Trường Cao Đẳng Kỹ thuật thông tin
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Thiếu tá Trần Đăng Lượng
                    </div>
                </div>
            </div>
        </div>




        <script type="text/javascript">
            $(document).ready(function () {
                console.log("PO ready");

                $("#po-input").change(function(){
                    var cmd = $(this).val();
                    var isValidCmd = checkCommandValid(cmd);
                    console.log(isValidCmd);
                    if(isValidCmd) {
                        processCommand(cmd);
                    }else {
                        console.log("Câu lệnh không đúng cú pháp, chưa thực hiện gửi tới tổng đài");
                    }

                })



                function processCommand(cmd) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '/admin/ajaxPO',
                        data: { 'task': 'ajaxPO', 'po_input': cmd },
                        dataType: 'json',
                        beforeSend: function(){
                            $("#po-output-text").html("...");
                        },
                        success: function (data) {
                            console.log(data);
                            $("#po-output-text").html(data.message);
                            $("#po-output").val(data.output);
                            if(cmd.indexOf("*50") >= 0) {
                                location.href="/admin/khaibaoPO?cauhinh_active=" + data.thamso + "&cauhinh_type=kichhoat";
                            }
                            if(cmd.indexOf("*41") >= 0) {
                                var dauso = data.thamso;
                                $("#tong-dai-1-text").html( dauso + "100");
                                $("#td-1-phone-po").attr("data-phone-number", dauso + "100");
                                $("#td-1-phone-po .phone-number-text").html(dauso + "100");

                                $("#td-1-phone-2").attr("data-phone-number", dauso + "101");
                                $("#td-1-phone-2 .phone-number-text").html(dauso + "101");

                                $("#td-1-phone-3").attr("data-phone-number", dauso + "102");
                                $("#td-1-phone-3 .phone-number-text").html(dauso + "102");
                            }
                            $("#code").val("");
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });

                }


                function checkCommandValid(cmd) {
                    const regex = /^\*([0-9]{2})\*?([0-9]*)\#/gm;

                    // Alternative syntax using RegExp constructor
                    // const regex = new RegExp('^\\*([0-9]{2})\\*?([0-9]*)\\#', 'gm')
                    let m;
                    var count = 0;
                    while ((m = regex.exec(cmd)) !== null) {
                        /*
                        // This is necessary to avoid infinite loops with zero-width matches
                        if (m.index === regex.lastIndex) {
                            regex.lastIndex++;
                        }

                        // The result can be accessed through the `m`-variable.
                        m.forEach((match, groupIndex) => {
                            console.log(`Found match, group ${groupIndex}: ${match}`);
                        });
                        */
                       count = 1;
                    }

                    return count;
                }

                $(".phone-item a").click(function(){
                    var phone_number = $(this).attr('data-phone-number');
                    var tong_dai = $(this).attr('data-phone-td');
                    var stt = $(this).attr('data-phone-stt');
                    $("#active_phone_number").val(phone_number);
                    $("#active_tong_dai").val(tong_dai);
                    $("#active_stt").val(stt);
                    $("#active-phone").html("TĐ " + tong_dai + ": " + phone_number);
                    $(".keyboard-wrap ").show();
                })

                $("#enter-cmd").click(function(){
                    var cmd = $("#code").val();
                    var phone_number = $("#active_phone_number").val();
                    var tong_dai = $("#active_tong_dai").val();
                    var stt = $("#active_stt").val();
                    console.log(cmd);
                    var isValidCmd = checkCommandValid(cmd);
                    console.log(isValidCmd);
                    if(isValidCmd) {
                        if(tong_dai == 1 && stt == 1) {
                            processCommand(cmd);
                        }else {
                            alert("Hàm gọi máy " + phone_number + " - Tổng đài " + tong_dai + " không được phép khai báo");
                        }
                    }else {
                        alert("Câu lệnh không đúng cú pháp, chưa thực hiện gửi tới tổng đài");
                    }
                })




                $(".close-keyboard ").click(function(){
                    $(".keyboard-wrap ").hide();
                })








            });
        </script>








    </body>
</html>
