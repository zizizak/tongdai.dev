<?php
require_once "connection.php";
$sql = "selection t.*, "

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khai báo thue bao IP</title>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body id="body">
    @include('ipu')
    <form action = "reg.php" method = "POST">
        <form>
            <h2>Thông tin thuê bao</h2>
        </form>


        <form class="right-column">
            <div class="">
                <h3>Thông tin chung</h3>
                <div style="float: left">
                    <p>Số thuê bao: <input type="text" name="sothuebao" value=""></p>
                </div>
                <div style="float: left">
                    <p>Tên thuê bao: <input type="text" name="tenthuebao" value=""></p>
                </div>
                <div style="float: left">
                    <p>Mật khẩu: <input type="password" name="password" value=""></p>
                </div>
            </div>

            <div style="float:left">
                <p>Dial Plan: <select name="dialplan">
                        <option value="">All1</option>
                        <option value="">All2</option>
                        <option value="">All3</option>
                        <option value="">All4</option>
                    </select></p>
            </div>
        </form>
        <form class="right-column">
            <p>Chuẩn báo hiệu: SIP <input type="radio" name="gender" value="Sip">IAX <input type="radio"
                    name="gender" value="iax"></p>
        </form>
        <form class="right-column">
            <h3>Mã thoại</h3>
            <p style="float: left">Thứ 1: <select name="thu1">
                    <option value="">none</option>
                    <option value="">ulax</option>
                    <option value="">gms</option>
                </select></p>
            <p style="float: left">Thứ 2: <select name="thu2">
                    <option value="">none</option>
                    <option value="">ulax</option>
                    <option value="">gms</option>
                </select></p>
            <p style="float: left"> Thứ 3: <select name="thu3">
                    <option value="">none</option>
                    <option value="">ulax</option>
                    <option value="">gms</option>
                </select></p>
            <p style="float: left">Thứ 4: <select name="thu4">
                    <option value="">none</option>
                    <option value="">ulax</option>
                    <option value="">gms</option>
                </select></p>
            <p style="float: left">Thứ 5: <select name="thu5">
                    <option value="">none</option>
                    <option value="">ulax</option>
                    <option value="">gms</option>
                </select></p>

        </form>

        <form class="right-column">
            <h3>Cài đặt VoiP</h3>
            <p style="float: left">NAT <input type="checkbox" name="check_nat" value="NAT"></p>

            <p style="float: left">DTMF Model: <select name="dtmf">
                    <option value="">none</option>
                    <option value="">rfc2833</option>
                </select></p>
            <p style="float: left">Insecure: <select name="Insecure">
                    <option value="">yes</option>
                    <option value="">no</option>
                </select></p>
            <p style="float: left">Can riinvite: <select name="riinvite">
                    <option value="">yes</option>
                    <option value="">no</option>
                </select></p>
            <p style="float: left">Is Agent <input type="checkbox" name="Agent" value="NAT"></p>

            <p style="float: left">Pickup Group: <select name="Pickup">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select></p>
            <p style="float: left">Void mail <input type="checkbox" name="check_voidmail" value="voidmail"></p>


        </form>
        <form class="right-column">
            <h2>Danh sách thuê bao IP hiện có</h2>

            <table border="1" align="center" cellspacing="0" cellpadding="0" width="850px">
                <tr>
                    <th>Số thuê bao</th>
                    <th>Tên thuê bao</th>
                    <th>Dialplan</th>
                    <th>chuẩn</th>
                    <th>Mã thoại</th>
                    <th>Nat</th>
                    <th>DTMF Model</th>
                    <th>Insecure</th>
                    <th>Can riinvite</th>
                    <th>Is Agent</th>
                    <th>Pickup Group</th>
                </tr>
                <tr>
                    <td>999100</td>
                    <td>Tên thuê bao</td>
                    <td>Dialplan</td>
                    <td>chuẩn</td>
                    <td>Mã thoại</td>
                    <td>Nat</td>
                    <td>DTMF Model</td>
                    <td>Insecure</td>
                    <td>Can riinvite</td>
                    <td>Is Agent</td>
                    <td>Pickup Group</td>
                </tr>



            </table>
        </form>
        <form class="right">
            <h3>Chế độ làm việc</h3>
            {{-- <p>Xem / sửa / xóa <input type="radio" name="gender" value="Sip" checked = true></p>
       <p>Thêm <input type="radio" name="gender" value="iax"></p> --}}
            <div>
                <label><input type="radio" name="colorRadio" value="red" checked=true> Xem / sửa / xóa </label><br>
                <label><input type="radio" name="colorRadio" value="blue"> Thêm</label>
            </div>
            <input class="sua" data-id="sua" type="submit" value="Sửa">
            <input class="xoa" data-id="xoa" type="submit" value="Xóa">
            <input type="submit" class="form-control" data-id="them"  value="Thêm">
            <a href="add.php">Thêm thuê bao</a>

            {{-- <div class="red box">Bạn đã chọn <strong>red radio button</strong></div>
    <div class="blue box">Bạn đã chọn <strong>blue radio button</strong></div> --}}

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            {{-- <script>
        $(document).ready(function () {
            $('input[type="radio"]').click(function () {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".sua").not(targetBox).hide();
                $(".xoa").not(targetBox).hide();

                $(targetBox).show();
            });
        });
    </script> --}}

        </form>
    </form>

</body>

</html>
<script>
    function myFunction() {
        location.replace("thuebaoipu.blade.php")
    }
</script>
