
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khai báo hướng gọi ra</title>
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body id="body">
@include('ipu')
<form>
    <form>
        <h2>Thông tin hướng gọi ra cần thêm mới</h2>
    </form>


    <form class="right-column">
        <div class="">
              <h3>Thông tin chung</h3>
        <div style="float: left">
            <p>Tên hướng gọi ra: <input type="text" name="tenhuonggoira" value=""></p>
        </div>
        <div style="float: left">
            <p>Đầu số: <input type="text" name="dauso" value=""></p>
        </div>
        <div style="float: left">
            <p>Số chủ gọi: <input type="text" name="text" value=""></p>
        </div>
        </div>
    </form>

     {{-- <form action="">
        <div>
            <p>Đăng ký học: HTML <input type="checkbox" name="check_html" value="HTML">, CSS <input type="checkbox" name="check_css" value="CSS"></p>
        </div>
        <p>Giới tính: Nam <input type="radio" name="gender" value="Nam">, Nữ <input type="radio" name="gender" value="Nữ"></p>
        <p>Thành phố: <select name="city">
            <option value="Hà Nội">Hà Nội</option>
            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
            <option value="Đà Nẵng">Đà Nẵng</option>
            <option value="Cần Thơ">Cần Thơ</option>
        </select></p>
        <p>Tin nhắn:<br>
        <textarea cols="30" rows="7" name="message"></textarea></p>
        <button type="submit">Gửi</button>
    </form> --}}
<form class="right-column">
    <h3>Cấu hình hướng gọi ra</h3>
    <p style="float: left">Trung kế: <select name="thu1">
        <option value="">none</option>
        <option value="">ulax</option>
        <option value="">gms</option>
    </select></p>
    <div style="float: left">
        <p>Digrit chèn vào: <input type="text" name="text" value=""></p>
    </div>
    <div style="float: left">
        <p>Digrit bị chặn: <input type="text" name="text" value=""></p>
    </div>
    <p style="float: left">Sử dụng trung kế dự phòng <input type="checkbox" name="check_nat" value="NAT"></p>

</form>

<form class="right-column">
    <h2>Danh sách hướng gọi ra hiện có</h2>

<table border = "1" align = "center" cellspacing = "0" cellpadding = "0" width = "900px">
  <tr>
    <th>Hướng gọi ra</th>
    <th>Caller ID/th>
    <th>Đầu số quay</th>
    <th>Trung kế</th>
    <th>Số Digrit bị chặn</th>
    <th>Digrit chèn vào</th>
    <th>Trung kế (DP)</th>
    <th>Số Digrit bị chặn (DP)</th>
    <th>Digrit chèn vào (DP)</th>
  </tr>




</table>
</form>
<form class="right">
    <h3>Chế độ làm việc</h3>
    <p>Xem / sửa / xóa <input type="radio" name="gender" value="Sip" checked=true></p>
       <p>Thêm <input type="radio" name="gender" value="iax"></p>

</form>
</form>

</body>
</html>
<script>
    function myFunction(){
        location.replace("huonggoiraipu.blade.php")
    }
</script>
