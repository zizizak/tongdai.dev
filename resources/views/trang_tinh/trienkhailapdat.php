<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="http://tongdai.dev.test/assets/css/lythuyet.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h3 style="margin-left: 100px; margin-top: 20px">SƠ ĐỒ KẾT NỐI</h3>
<img src="/storage/images/sodoketnoi.png" style="margin-left: 50px;" class="img" />
    <h4>I. CÁC VẬT TƯ DỤNG CỤ CẦN THIẾT</h4>
    <P>- Máy đo điện trở đất.</P>
    <P>- Máy đo luồng.</P>
    <P>- Máy đo điện áp, dòng điện.</P>
    <P>- Dụng cụ kiểm tra thuê bao.</P>
    <P>- Các công cụ, dụng cụ: kìm, dao bấm dây, tuốc vít…</P>
    <H4>II. TỔ CHỨC TRIỂN KHAI LẮP ĐẶT</H4>
    <h5>1. Các lưu ý chung</h5>
    <p>- Không đấu nối nguồn, bật tổng đài trước khi hoàn tất quá trình kiểm tra.</p>
    <p>- Không lắp đặt tổng đài trong điều kiện mưa bão.</p>
    <p>- Sử dụng các dây cấp nguồn kèm theo tổng đài hoặc dây cấp nguồn có kích thước tương đương.</p>
    <p>- Không buộc các dây cấp nguồn lại với nhau để tránh làm quá nhiệt.</p>
    <p>- Đảm bảo tổng đài được tiếp đất đúng cách.</p>
    <h5>2. Chuẩn bị lắp đặt</h5>
    <h5>a) Chuẩn bị lắp đặt</h5>
    <p>Mở thùng tổng đài T64SIP và kiểm tra các thành phần & phụ kiện của tổng đài theo danh sách. Kiểm tra các hư hỏng
        vật lý (nếu có).</p>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 40%;">Tên thành phần</th>
            <th style="width: 15%;">Mã hiệu</th>
            <th style="width: 15%;">Số lượng</th>
            <th style="width: 20%;">Đơn vị tính</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Bảng mạch điều khiển (CPU)</td>
            <td>S1CPU</td>
            <td>01</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bảng mạch trung kế luồng E1và bảng mạch IPU được lắp trên card luồng E1 (nếu có).</td>
            <td>S14E1</td>
            <td>01</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Bảng mạch thuê bao</td>
            <td>S1SUB</td>
            <td>01-08</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Bảng mạch trung kế CO/ĐKX</td>
            <td>S1EXT</td>
            <td>01</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Bảng mạch truyền số liệu</td>
            <td>S1IPX</td>
            <td>01</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Bảng mạch nguồn (PWR)</td>
            <td>S1PWS</td>
            <td>02</td>
            <td>Bảng mạch</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Cáp kết nối máy tính</td>
            <td></td>
            <td>01</td>
            <td>Sợi</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Cáp kết nối truyền số liệu</td>
            <td></td>
            <td>01</td>
            <td>Sợi</td>
        </tr>
        <tr>
            <td>9</td>
            <td>CD chương trình quản lý, cấu hình, tính cước tổng đài</td>
            <td></td>
            <td>01</td>
            <td>Bộ</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Tài liệu hướng dẫn sử dụng</td>
            <td></td>
            <td>01</td>
            <td>Quyển</td>
        </tr>
    </table>
    <p><strong>Lưu ý : </strong>Tùy từng cấu hình mà số lượng và chủng loại card có thể thay đổi.</p>
    <h5>b) Yêu cầu môi trường triển khai lắp đặt</h5>
    <p>Môi trường lắp đặt tổng đài đáp ứng tiêu chuẩn yêu cầu lắp đặt của hệ thống viễn thông để tăng tuổi thọ của tổng
        đài. Để đảm bảo cho tổng đài hoạt động ổn định, độ bền cao, khu vực lắp đặt tổng đài nên ở những nơi:</p>
    <p>- Không bị ánh sáng mặt trời chiếu trực tiếp, môi trường khô thoáng, tránh ẩm ướt.</p>
    <p>- Không bị ảnh hưởng bởi bụi và các hóa chất.</p>
    <p> - Không nằm trong các khu vực bị rung chấn.</p>
    <p> - Không gần các máy cao tần, các máy hàn điện hay các thiết bị gây nhiễu vô tuyến (lò vi sóng, các trạm phát
        sóng…).</p>
    <h5>3. Tiến hành lắp đặt tổng đài</h5>
    <h5>a) Lắp đặt tổng đài</h5>
    <p>Quá trình lắp đặt tổng đài được thực hiện theo các bước:</p>
    <p>1. Mở nắp mặt trước và nắp sau của tổng đài, kiểm tra tình trạng tổng đài sau quá trình vận chuyển.

    </p>
    <p> 2. Kiểm tra hệ thống nguồn -48VDC cung cấp cho tổng đài (nếu hoạt động tốt điện áp cấp ra phải từ 52 ÷ 54VDC).
    </p>
    <p> 3. Kiểm tra công tắc nguồn của tổng đài ở vị trí tắt (OFF).
    </p>
    <p> 4. Đấu dây nguồn từ đầu ra của bộ nguồn vào đúng vị trí nguồn tổng đài theo hướng dẫn. Lưu ý: Phải lắp đặt đúng
        cực tính nguồn (có ghi trên tổng đài).
    </p>
    <p> 5. Đấu dây tiếp đất vào cọc tiếp đất ( ) ở mặt sau tổng đài.
    </p>
    <p> 6. Đấu dây tiếp đất vào cọc FG ở phía sau tổng đài.
    </p>
    <p> 7. Đấu dây kết nối tổng đài với máy tính PC (có thể đấu sau khi tổng đài hoạt động).
    </p>
    <p> 8. Đấu dây luồng E1 (nếu có) vào vị trí IN và OUT ở mặt sau của tổng đài (có thể đấu sau khi tổng đài đã hoạt
        động).
    </p>
    <h5>b) Đo, kiểm tra sau lắp đặt</h5>
    <p>Kiểm tra điện áp và cực tính của nguồn cấp cho tổng đài, các cọc đấu nối nguồn của tổng đài, của bộ cấp nguồn
        phải chắc chắn, ổn định, tránh lỏng lẻo có thể chạm chập, gây hư hỏng cho tổng đài.</p>
    <h5>c) Cấp nguồn và khởi động tổng đài</h5>
    <p>Bật công tắc nguồn trên tổng đài về vị trí mở (ON). (Lưu ý đo kiểm nguồn cấp vào tổng đài trước khi bật).</p>
    <p>Quan sát trạng thái LED ở mặt trước tổng đài để xác định trạng thái của tổng đài. Trạng thái các LED khi tổng đài
        hoạt động tốt:</p>
    <table>
        <tr>
            <th>LED</th>
            <th>Trạng thái</th>
        </tr>
        <tr>
            <td>Bảng mạch nguồn</td>
            <td>
                <p>Các LED tương ứng với các nguồn điện áp trên bảng mạch nguồn sáng xanh. LED ERR tắt.</p>
                <p>LED RUN của bảng mạch nguồn khi bảng mạch đang hoạt động sẽ sáng xanh.</p>
            </td>
        </tr>
        <tr>
            <td>Bảng mạch điều khiển (CPU)</td>
            <td>
                <p>LED trên (màu xanh) của cổng RJ45 phía trên sáng liên tục, LED dưới (màu vàng) trên cổng RJ45 phía
                    trên sáng nhấp nháy đều đặn; đồng thời các LED 7 đoạn ở mặt trước của tổng đài sẽ hiển thị chuyển
                    đổi giữa tháng-ngày và giờ-phút đã thiết lập cho tổng đài.</p>
            </td>
        </tr>
        <tr>
            <td>Bảng mạch trung kế E1</td>
            <td>
                <p>LED báo hiệu đồng bộ luồng SYNC sáng xanh khi nhấn nút đồng bộ SYNC.</p>
            </td>
        </tr>
        <tr>
            <td>Bảng mạch thuê bao, trung kế CO/ĐKX</td>
            <td>
                <p>Các đèn LED tắt khi thuê bao rỗi.</p>
                <p>Các đèn LED tắt khi trung kế không hoạt động.</p>
            </td>
        </tr>
    </table>
    <p>Đấu cáp thuê bao theo thứ tự của cọc đấu dây ở phía sau tổng đài (có đánh số thứ tự trên từng cọc).</p>
    <p>Nhấc máy 1 thuê bao bất kỳ trong tổng đài để nghe cấp âm hiệu mời quay số (dial tone), đèn LED tương ứng của thuê
        bao ở mặt trước sáng xanh liên tục, sau đó bấm mã dịch vụ thử chuông (*18#) và gác máy.</p>
    <p>Tổng đài sẽ đổ chuông cho thuê bao, đèn LED tương ứng của thuê bao nhấp nháy chu kỳ 1s/3s.</p>
    <p>Đấu loop từ đầu OUT vào đầu IN của luồng E1. Đăng nhập hệ thống bằng thuê bao bất kỳ (*14*101234567#), sau đó bấm
        mã dịch vụ hiển thị thông số luồng E1- 1 (*61*1#). Đèn LED 7 đoạn đầu tiên sẽ hiển thị trạng thái đồng bộ luồng
        (nếu hiển thị 1: Đồng bộ tốt, nếu hiển thị 0: Chưa đồng bộ). Quan sát đèn LED chỉ thị đồng bộ luồng ở mặt trước
        sáng xanh liên tục.</p>
    <p>Trong quá trình lắp đặt và kiểm tra tổng đài, nếu trạng thái các LED của tổng đài không đúng theo mô tả, có thể
        tham khảo ở mục “Các lỗi thường gặp và cách khắc phục” bên dưới của tài liệu này hay liên hệ với bộ phận sửa
        chữa & bảo hành của công ty TECAPRO.</p>










</body>

</html>
