<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://tongdai.dev.test/assets/css/lythuyet.css">

    <!-- <link rel="stylesheet" type="text/css" href="./lythuyet.css" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <h3>Cấu trúc chung</h3>
    <p>Tổng đài T64SIP là một khối gồm hai thành phần chính là vỏ hộp bên ngoài và các bảng mạch hoạt động bên trong.
        Bên ngoài tổng đài bao gồm các giao diện cho người dùng như giao diện hiển thị, giao diện đấu nối thuê bao,
        luồng E1 .v.v…</p>
    <p>Để đảm bảo các yêu cầu kỹ thuật với kích thước gọn nhẹ, độ tin cậy cao, nguồn tiêu thụ nhỏ, dễ lắp đặt và thay
        thế sửa chữa, tổng đài được thiết kế theo các bảng mạch chức năng có cấu trúc mở, cho phép dễ dàng thay đổi cấu
        hình và mở rộng dung lượng.</p>
    <p>Các giao diện bên ngoài ở mặt trước và mặt sau tổng đài cho người khai thác thuận tiện, nhanh gọn trong điều kiện
        sử dụng như triển khai cố định hoặc diễn tập.</p>

    <h4>1. Cấu trúc mặt trước</h4>


    <img src="/storage/images/mattruoc11.jpg" class="img" id="styledImage" style="" usemap="#image-map">

    <map name="image-map">
        <area target="self" alt="" title="Tên tổng đài" href="" coords="376,62,547,110" shape="rect">
        <area target="self" alt=""
            title="Màn hình Led 7 đoạn hiển thị thời gian và tham số tổng đài khi thực hiện các câu lệnh kiểm tra"
            href="" coords="564,72,648,107" shape="rect">
        <area target="" alt="" title="Vị trí cắm Card" href="http://tongdai.dev.test/admin/cacloaicard"
            coords="53,152,742,559" shape="rect">
        <area target="" alt="" title="Swith 8 port và các đèn LED báo hiệu trạng thái hoạt động các port trên Switch"
            href="#" coords="91,87,293,112" shape="rect">
    </map>

    <table style=" margin-top:30px">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Tên tổng đài</td>
            <td>
                <p>Mã hiệu tổng đài của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>
                <p>Vị trí các khe cắm bảng mạch và giao diện phía trước các bảng mạch</p>
            </td>
            <td>
                <p>Mặt trước là một khung liền, được dập theo vị trí các cổng và các LED của từng bảng mạch theo thứ tự
                    từ trái qua phải: CPU, E1, SUB1-SUB8, EXT, IPX, POWER1, POWER2.
                    Các mặt card được thiết kế lẫy sử dụng cho mục đích cắm và tháo card.
                </p>
                <img src="/storage/images/card.png" class="img" />

                <!-- <img alt="card" src="./image/card.png" style="width: 600px; height: auto;"> -->
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>
                <p>Đèn hiển thị ngày giờ</p>
            </td>
            <td>
                <p>Sử dụng đèn 7 đoạn để hiển thị ngày, giờ. Đèn hiển thị này cũng để quan sát một số thông số cấu hình
                    của tổng đài.
                </p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>
                <p>Cơ cấu chân đế</p>
            </td>
            <td>
                <p>Dùng để hỗ trợ cho người dùng khi lắp đặt tổng đài.
                </p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>
                <p>Swith 8 port và các đèn LED báo hiệu trạng thái hoạt động các port trên Switch</p>
            </td>
            <td>
                <p>Dùng để kết nối mạng cho các thuê bao IP kết nối với tổng đài T64SIP hoặc các tổng đài IP thông qua
                    khai báo các trung kế IP
                </p>
            </td>
        </tr>
    </table>
    <h4>2. Cấu trúc mặt sau</h4>
    <img src="/storage/images/matsau12.jpg" class="img" id="styledImage" style="" usemap="#image-map1" />
    <map name="image-map1">
        <area target="" alt="" title="Giao diện kết nối nguồn điện" href="" coords="24,509,164,587" shape="rect">
        <area target="" alt="" title="Công tắc nguồn đầu vào" href="" coords="169,514,262,576" shape="rect">
        <area target="" alt="" title="Giao diện các jack DB36 đấu nối thuê bao, trung kế" href=""
            coords="61,136,747,310" shape="rect">
        <area target="" alt="" title="Giao diện luồng E1 dùng Jack DB25" href="" coords="341,446,462,536" shape="rect">
        <area target="" alt="" title="Giao diện luồng E1 dùng Domino nhấn giữ" href="" coords="484,447,599,526"
            shape="rect">
        <area target="" alt="" title="Cọc tiếp đất" href="" coords="269,453,318,505" shape="rect">
        <area target="" alt="" title="Cầu chì" href="" coords="193,471,228,509" shape="rect">
        <area target="" alt="" title="Rãnh tản nhiệt" href="" coords="146,44,651,120" shape="rect">

    </map>
    <!-- <img alt=" Cấu trúc chung tổng đài" src="./image/matsau.png" style="width: 800px; height: auto;"> -->
    <table style=" margin-top:30px">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Giao diện kết nối nguồn cung cấp</td>
            <td>
                <p>Được thiết kế các cọc dạng Domino, cho phép cố định cáp nguồn chắc chắn. Giao diện bao gồm các vị
                    trí:</p>
                <p> +VIN: Đấu nối vào nguồn dương</p>
                <p>-VIN: Đấu nối vào nguồn âm</p>
                <p>FG: Đấu nối mass</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>
                <p>Công tắc nguồn đầu vào</p>
            </td>
            <td>
                <p>Công tắc nguồn cho phép cách ly cả nguồn dương và nguồn âm.</p>
                <p>OFF: Vị trí tắt nguồn vào</p>
                <p>ON: Vị trí bật nguồn vào</p>

            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>
                <p>Giao diện các jack DB36 đấu nối thuê bao, trung kế</p>
            </td>
            <td>
                <p>+ Từ Jack SUB1-SUB4: Dùng cho đấu nối các thuê bao, cả thuê bao tự động và thuê bao từ thạch, loại
                    TA57B.
                </p>
                <p>+ Jack EXT: Dùng cho đấu nối các đường trung kế CO và ĐKX.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>
                <p>Giao diện luồng E1</p>
            </td>
            <td>
                <p>Có 02 giao diện luồng E1-120 Ω, kết nối linh hoạt, dùng trong nhà trạm hay khai thác dã chiến. Có thể
                    dùng Jack DB25 hoặc Domino nhấn giữ.</p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>
                <p>Cọc tiếp đất</p>
            </td>
            <td>
                <p>Tiếp đất vào hệ thống tiếp đất chung của nhà trạm.</p>
            </td>
        </tr>
        <tr>
            <td>(6)</td>
            <td>
                <p>Rãnh tản nhiệt</p>
            </td>
            <td>
                <p>Tản nhiệt cho hệ thống quạt hút bên trong.</p>
            </td>
        </tr>
    </table>
    <script href="http://tongdai.dev.test/assets/css/main-pm.js"></script>
</body>

</html>