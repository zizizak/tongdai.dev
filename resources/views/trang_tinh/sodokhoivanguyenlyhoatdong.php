<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="./lythuyet.css" /> -->
<link rel="stylesheet" href="http://tongdai.dev.test/assets/css/lythuyet.css">

<title>Sơ đồ khối và chức năng các khối</title>
</head>

<body>
    <figure>

        <img src="/storage/images/sdk.png" style="margin-left: 100px;" class="img" usemap="#image-map">


        <!-- <img src="/storage/images/sdk.png" class="img" /> -->
        <!-- <img alt="Sơ đồ khối và chức năng các khối" src="./image/sdk.png" style="width: 80%; height: 700px;"> -->
        <H3>Nguyên lý hoạt động của các khối</H3>
        <table>
            <tr>
                <th style="width: 25%;">Các khối</th>
                <th style="width: 75%;">Nguyên lý làm việc</th>
            </tr>
            <tr>
                <td>Bảng mạch nguồn (bảng mạch PWR)</td>
                <td>
                    <p>Khối nguồn này nhận nguồn từ hệ thống nguồn nhà trạm (-48VDC), sau đó chuyển đổi thành các loại
                        nguồn
                        ra để cung cấp cho các khối thuê bao SUB hoạt động. Đầu ra bao gồm các nguồn DC: 5V, -5V, 12V,
                        -48V
                        và nguồn chuông: 75VAC-25Hz.</p>
                    <p>Khi cắm các bảng mạch nguồn vào các khe tương ứng trên mạch đáy, các loại nguồn đã được chuyển
                        đổi sẽ
                        cung cấp cho các bảng mạch thành phần thông qua các kết nối trên mạch đáy.</p>
                    <p>Bảng mạch nguồn là thành phần quan trọng duy trì hoạt động của tổng đài và hoạt động với công
                        suất
                        lớn, do đó được hoạt động ở chế độ dự phòng 1+1…</p>


                </td>
            </tr>
            <tr>
                <td>Bảng mạch thuê bao (bảng mạch SUB)</td>
                <td>
                    <p>Bảng mạch thuê bao có chức năng cung cấp các cổng kết nối với các thuê bao đầu cuối.</p>
                    <p>Khối thuê bao gồm tối đa 8 bảng mạch được thiết kế mở, người dùng có thể lắp số bảng mạch thuê
                        bao
                        theo mong muốn tùy theo dung lượng sử dụng hoặc có thể hoán đổi vị trí các bảng mạch thuê bao
                        khi
                        cần thiết.</p>
                    <p>Việc nhận biết và quản lý bảng mạch thuê bao được thực hiện bởi bảng mạch CPU, thông qua giao
                        tiếp
                        SPI.</p>
                </td>
            </tr>
            <tr>
                <td>Bảng mạch trung kế (bảng mạch EXT)</td>
                <td>
                    <p>- Tạo 4 kênh trung kế CO kết nối với tổng đài khác cụ thể:</p>
                    <p>+ Phát lặp tín hiệu (thông tin địa chỉ) lên đường trung kế.</p>
                    <p>+ Nhận tín hiệu đảo cực và tín hiệu chuông từ tổng đài ngoài gọi vào.</p>
                    <p>+ Kết nối âm hiệu và tín hiệu thoại…</p>
                    <p>- Trạng thái hiển thị của các đèn LED: Trên card có 8 đèn ứng với 4 cổng trung kế CO và 4 cổng
                        ĐKX
                    </p>
                    <p>+ Khi đèn LED cổng nào sáng là cổng trung kế đó đang làm việc</p>
                    <p>+ Khi đèn LED tắt là cổng trung kế không làm việc</p>
                    <p>- Tạo 4 kênh ĐKX</p>
                    <p>+ Cấp điện áp chuông cho thiết bị đầu cuối</p>
                    <p>+ Nhận biết chuông gọi vào</p>
                    <p>+ Kết nối thoại cho thiết bị đầu cuối</p>
                    <p>+ Khi đèn LED cổng nào sáng là cổng ĐKX đó đang làm việc</p>
                    <p>+ Khi đèn LED tắt là cổng ĐKX không làm việc</p>

                </td>
            </tr>
            <tr>
                <td>Bảng mạch luồng E1 (bảng mạch E1)</td>
                <td>
                    <p>- Chức năng:
                    <p>+ Tạo các kênh báo hiệu, đồng bộ và kênh thoại trên luồng 2Mb/s</p>
                    <p>+ Tạo và giải mã tín hiệu MFC</p>
                    <p>+ Nhận tín hiệu (Clock) từ tổng đài bạn cấp sang</p>
                    <p>+ Kết nối với tổng đài khác thông qua thiết bị truyền dẫn. Có thể mở rộng liên lạc tối đa 4 luồng
                        E1
                        riêng biệt. Thu phát báo hiệu R2- MFC</p>
                    <p>- Trạng thái hiển thị của các LED:</p>
                    <p>Có 4 Led phía dưới ứng với 4 luồng E1 sáng xanh khi tổng đài được kết nối đồng bộ (phiên bản 2007
                        như
                        T64S)</p>
                    <p>- Nút ấn test dùng để kiểm tra chất lượng bảng mạch, khi ấn nút các đầu vào (IN) và đầu ra (OUT)
                        trên
                        card sẽ tự đấu vòng, các Led đồng bộ trên card sẽ sáng báo hiệu card làm việc tốt.</p>
                    <p>Chú ý: Trên card E1 tổng đài phiên bản mới không thể hiện các Led báo hiệu MFC mà được thể hiện
                        trên
                        Card CPU.</p>
                    <p>- Tích hợp card chuyển mạch IP (Thực hiện các chức năng khối CM IP)</p>
                    </p>
                </td>
            </tr>
            <tr>
                <td>Khối điều khiển (bảng mạch CPU)</td>
                <td>
                    <p>- Chức năng: Đây là bộ xử lý trung tâm, nó điều khiển và xử lý mọi hoạt động của tổng đài.</p>
                    <p>+ Điều khiển kết nối nội bộ (nhận biết trạng thái TB, nhận TT địa chỉ,…)</p>
                    <p>+ Điều khiển kết nối ra trung kế…</p>
                    <p>+ Điều khiển hiển thị…</p>
                    <p>+ Điều khiển cảnh báo…</p>
                    <p>- Trạng thái của led trên card CPU: Có 2 led (01 màu xanh, 01 màu vàng) gắn cạnh zắc RJ45 sáng
                        nhấp
                        nháy khi tổng đài hoạt động bình thường </p>
                    <p>- Nút ấn reset được sử dụng để kiểm tra trong trường hợp các thuê bao và kênh trung kế bị lỗi.
                    </p>
                    <p>- Zắc RJ45 kết nối với máy tính khi khai báo, quản lý TĐ </p>

                </td>
            </tr>
            <tr>
                <td>Khối nguồn vào (POWER SUPPLY -48VDC)</td>
                <td>
                    <p>Cung cấp nguồn cho các bảng mạch nguồn hoạt động. Hệ thống nguồn cung cấp được lấy từ phía nhà
                        trạm
                        hoặc hệ thống nguồn trên các xe cơ động.</p>
                </td>
            </tr>
            <tr>
                <td>Phần mềm quản lý</td>
                <td>
                    <p>Thực hiện giám sát và cấu hình cho tổng đài qua giao diện người dùng. Phần mềm quản lý được cài
                        đặt
                        vào máy tính, kết nối với tổng đài qua giao diện RS232 hoặc IP (nếu có gắn khối IPU).</p>
                </td>
            </tr>
        </table>
</body>

</html>