<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://tongdai.dev.test/assets/css/lythuyet.css">
    <!-- <link rel="stylesheet" type="text/css" href="./lythuyet.css" /> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Một số PAN và cách khách phục</title>
</head>

<body>
    <h5>1. Bảng mạch nguồn (PWR)</h5>
    <p>Hoạt động bình thường khi tất cả các đèn LED chỉ thị (RUN, VIN, -5V, +5V, +12V, -48VDC) sáng rõ màu xanh, liên
        tục; đèn LED ERR tắt; đèn 75VAC sáng rung, nhấp nháy theo chu kỳ đều đặn. Bảng mạch nào hoạt động, đèn RUN bảng
        mạch đó sáng, bảng mạch dự phòng đèn RUN tắt.</p>
    <img src="/storage/images/pwr11.png" alt="">
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 30%;">Hiện tượng</th>
            <th style="width: 20%;">Nguyên nhân</th>
            <th style="width: 50%;">Cách khắc phục</th>
        </tr>
        <tr>
            <td>1. Đèn ERR trên 1 bảng mạch sáng đỏ, kèm theo còi báo cảnh</td>
            <td>Bảng mạch lỗi</td>
            <td>
                <p>Nhấn và giữ nút RES trên bảng mạch nguồn báo lỗi cho đến khi đèn ERR tắt hẳn, nhả ra.</p>
            </td>
        </tr>
        <tr>
            <td>2. Đèn ERR trên 2 bảng mạch sáng đỏ, kèm theo còi báo cảnh</td>
            <td>Bảng mạch lỗi</td>
            <td>
                <p>kiểm tra nguồn DC cấp vào tổng đài (48 ÷ 52VDC), nếu nguồn cấp
                    vào tốt, thực hiện khởi động lại từng bảng mạch như hướng dẫn ở trên, nếu vẫn báo lỗi ERR, cần thay
                    thế bảng mạch mới.</p>
            </td>
        </tr>
        <tr>
            <td>3. Đèn chuông 75VAC không rung, không nhấp nháy theo chu kỳ đều đặn</td>
            <td>Tiếp xúc của bảng mạch nguồn không tốt</td>
            <td>
                <p>Kiểm tra tiếp xúc của bảng mạch nguồn, tiếp xúc của bảng mạch CPU với khe cắm bảng mạch; kiểm tra
                    đường điều khiển nguồn chuông trên bảng mạch đáy (mặt sau) chân 39 từ bảng mạch CPU phải nối thông
                    đến chân 18 của 2 bảng mạch nguồn.</p>
            </td>
        </tr>
        <tr>
            <td>4. Đèn LED VIN, +5V, -5V, +12V, -48V không sáng</td>
            <td>Mất điện áp cấp ra tương ứng</td>
            <td>
                <p>Kiểm tra điện áp cấp ra tương ứng trên bảng mạch đáy Main (có ghi chú trên mặt bảng mạch phía sau),
                    nếu không có điện áp, cần kiểm tra thay thế bảng mạch nguồn đó. Nếu có điện áp cấp ra, kiểm tra đèn
                    LED tương ứng.</p>
            </td>
        </tr>

    </table>



    <h5>2. Bảng mạch điều khiển (CPU)</h5>
    <p>Hoạt động bình thường khi đèn LED trên (CPU-RUN) của cổng RJ45 1x sáng liên tục, đèn LED dưới DTMF sáng nhấp
        nháy, đều đặn theo chu kỳ. Cổng RJ45 2x không được sử dụng trong bất kỳ trường hợp nào nếu không có sự hướng dẫn
        của nhà sản xuất.</p>
    <img src="/storage/images/cpu3.png" alt="">
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 30%;">Hiện tượng</th>
            <th style="width: 20%;">Nguyên nhân</th>
            <th style="width: 50%;">Cách khắc phục</th>
        </tr>
        <tr>
            <td>1. Các đèn LED chỉ thị khác</td>
            <td>Bảng mạch lỗi</td>
            <td>
                <p>Nhấn nút Reset bảng mạch CPU, các đèn LED chỉ thị lại bình thường, bảng mạch CPU hoạt động; nếu các
                    đèn LED vẫn chỉ thị khác, bảng mạch CPU cần được sửa chữa hoặc thay thế.</p>
            </td>
        </tr>
        <tr>
            <td>2. không kết nối được với máy tính, lấy cấu hình bị lỗi</td>
            <td>Tiếp xúc không tốt</td>
            <td>
                <p>Kiểm tra lại đầu kết nối RJ45 của bảng mạch CPU, dây kết nối máy tính, cổng mạng máy tính.</p>
            </td>
        </tr>

    </table>


    <h5>3. Bảng mạch giao tiếp luồng E1</h5>
    <p>Các đèn LED báo hiệu đồng bộ sáng khi có luồng ngoài kết nối vào tổng đài.</p>
    <img src="/storage/images/e1111.png" alt="">
    <table style="margin-top: 20px;margin-bottom: 20px;">
        <tr>
            <th style="width: 30%;">Hiện tượng</th>
            <th style="width: 20%;">Nguyên nhân</th>
            <th style="width: 50%;">Cách khắc phục</th>
        </tr>
        <tr span="2">
            <td>1. Mất đồng bộ luồng E1 hoặc đèn đồng bộ sáng rung</td>
            <td>Tiếp xúc không tốt</td>
            <td>
                <p>Kiểm tra các đầu kết nối luồng tương ứng trên mạch bảo an phía sau về độ tiếp xúc, độ chắc chắn.</p>
            </td>
        </tr>
        <tr>
            <td>2. không kết nối được với máy tính, lấy cấu hình bị lỗi</td>
            <td>Bảng mạch lỗi</td>
            <td>
                <p>Nhấn nút kiểm tra đồng bộ luồng nếu vẫn không sang đèn đồng bộ thì thay bảng mạch luồng khác hoặc
                    kiểm tra bảng mạch CPU.</p>
            </td>
        </tr>

    </table>


    <h5>4. Bảng mạch thuê bao (SUB)</h5>
    <p>Các thuê bao hoạt động bình thường khi trạng thái thuê bao rỗi, đèn LED thuê bao tương ứng tắt; khi thuê bao nhấc
        máy, đèn LED tương ứng sáng; khi thuê bao đổ chuông, đèn LED nhấp nháy theo nhịp chuông.</p>
    <img src="/storage/images/tb1.png" alt="">
    <table style="margin-top: 20px;margin-bottom: 20px;">
        <tr>
            <th style="width: 30%;">Hiện tượng</th>
            <th style="width: 20%;">Nguyên nhân</th>
            <th style="width: 50%;">Cách khắc phục</th>
        </tr>
        <tr span="2">
            <td>1. Nhấc máy không có tín hiệu, đèn Led không sáng</td>
            <td>Mất -48VDC</td>
            <td>
                <p>Đo kiểm tra điện áp giữa 2 cọc thuê bao (-48VDC). Nếu không có điện áp, kiểm tra đường mạch -48VDC
                    cấp vào thuê bao, lưu ý R330/2w, các chân thường đóng của Relay chuông (RLC), Relay thoại (RLT).
                    Thông thường do tiếp điểm thường đóng của RLC tiếp xúc không tốt. Nếu có điện áp, kiểm tra khối nhấc
                    máy (so sánh áp).</p>
            </td>
        </tr>
        <tr>
            <td>2. Nhấc máy không có tín hiệu, đèn Led sáng, không nghe tiếng Relay đóng</td>
            <td>Khối điều khiển RLT bị lỗi</td>
            <td>
                <p>Kiểm tra khối điều khiển đóng RLT. Thông thường
                    do C1815 (RLT) không có tín hiệu điều khiển đóng RLT.</p>
            </td>
        </tr>
        <tr>
            <td>3. Nhấc máy không có tín hiệu, Đèn LED sáng, có tiếng đóng Relay, không nghe tone mời quay số</td>
            <td>Biến áp cách ly bị lỗi</td>
            <td>
                <p>Kiểm tra biến áp cách ly, các đường tín hiệu đến khối chuyển đổi tín hiệu. Thông thường do TP3067 bị
                    lỗi.</p>
            </td>
        </tr>
        <tr>
            <td>4. Đèn LED sáng, có tiếng đóng Relay, nghe tone mời quay số, nhấn số không ngắt tone</td>
            <td>Khối chuyển đổi tín hiệu, điện trở khuếch đại vào/ra bị hỏng</td>
            <td>
                <p>Kiểm tra các trạng thái tín hiệu đến khối chuyển đổi tín hiệu, các điện trở khuyếch đại tín hiệu
                    vào/ra. Thông thường do TP3067 bị lỗi.</p>
            </td>
        </tr>
        <tr>
            <td>5. Máy điện thoại không đổ chuông, không nghe tiếng Relay đóng/ngắt theo nhịp chuông</td>
            <td>Khối điểu khiển RLC bị lỗi</td>
            <td>
                <p>Kiểm tra khối điều khiển RLC. Thông thường C1815 (RLC) không có tín hiệu điều khiển đóng/ngắt RLC.
                </p>
            </td>
        </tr>
        <tr>
            <td>6. Máy điện thoại không đổ chuông, nghe tiếng Relay đóng/ngắt theo nhịp chuông, có đèn nhấp nháy theo
                nhịp chuông</td>
            <td>Mạch nguồn chuông 75VAC bị lỗi</td>
            <td>
                <p>Kiểm tra đường mạch nguồn chuông 75VAC, lưu ý điện trở R1.5k/1W, RLC. Thông thường tiếp điểm thường
                    hở RLC tiếp xúc không tốt.
                </p>
            </td>
        </tr>
        <tr>
            <td>7. Nhấc máy không nghe tone hoặc tone không bình thường</td>
            <td>Khối chuyển đổi tín hiệu, khối biến áp bị lỗi</td>
            <td>
                <p>Kiểm tra khối chuyển đổi tín hiệu, khối biến áp. Thông thường khối chuyển đổi tín hiệu bị lỗi.
                </p>
            </td>
        </tr>
        <tr>
            <td>8. Không nhận bảng mạch thuê bao (tất cả các thuê bao đều không có tín hiệu hoặc tất cả thuê bao đều
                sáng đèn)</td>
            <td>Khối giao tiếp bị lỗi</td>
            <td>
                <p>Kiểm tra khối giao tiếp bảng mạch thuê bao, khối điều khiển chính MCU. Thông thường khối giao tiếp bị
                    lỗi.
                </p>
            </td>
        </tr>
        <tr>
            <td>9. Tất cả thuê bao trên bảng mạch sáng đèn hoặc đổ chuông</td>
            <td>Khối điều khiển MCU, khối điều khiển NBC, RLC bị lỗi</td>
            <td>
                <p>Kiểm tra khối điều khiển MCU, khối điều khiển NBC, RLC. </p>
            </td>
        </tr>

    </table>

    <h5>6. Bảng mạch trung kế CO/ĐKX</h5>
    <p>Hoạt động bình thường khi máy điện thoại nội đài nhấn chiếm trung kế, đèn LED tương ứng sáng, Relay trung kế
        đóng, nghe tone mời quay số, thực hiện cuộc gọi đến thuê bao của tổng đài khác thông thoại 2 chiều. Thuê bao
        ngoài gọi vào trung kế, đổ chuông máy trực, đèn LED trung kế sáng nhấp nháy theo nhịp chuông, nghe thông thoại 2
        chiều.</p>
    <img src="/storage/images/co.png" alt="">
    <table style="margin-top: 20px;margin-bottom: 20px;">
        <tr>
            <th style="width: 50%;">Hiện tượng</th>
            <th style="width: 20%;">Nguyên nhân</th>
            <th style="width: 30%;">Cách khắc phục</th>
        </tr>
        <tr span="2">
            <td>1. Không nhận line trung kế: Nhấn mã chiếm trung kế, nghe tone báo bận, đèn LED không
                sáng, không nghe Relay đóng, gọi từ ngoài vào không đổ chuông</td>
            <td>Khối báo tín hiệu line ngoài ENB lỗi</td>
            <td>
                <p>Kiểm tra khối báo tín hiệu line ngoài ENB.</p>
            </td>
        </tr>
        <tr>
            <td>2. Không đổ chuông khi gọi từ ngoài vào: Khi gọi từ ngoài vào trung kế, không đổ
                chuông máy trực hoặc không có báo hiệu quay số trực tiếp</td>
            <td>Khối báo chuông NBC, nhận báo chuông bị lỗi</td>
            <td>
                <p>kiểm tra khối báo chuông NBC, nhận báo chuông.</p>
            </td>
        </tr>
        <tr>
            <td>3. Không nghe tone khi chiếm, thông thoại 1 chiều, nghe thoại nhỏ hoặc không nghe</td>
            <td>Khối biến áp, khối chuyển đổi tín hiệu bị lỗi</td>
            <td>
                <p>Kiểm tra khối biến áp, khối chuyển đổi tín hiệu.</p>
            </td>
        </tr>


    </table>


</body>

</html>