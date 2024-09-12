<h4>1. Cấu trúc bảng mạch CPU</h4>
<h5>a) Chức năng</h5>
<p>Điều khiển toàn bộ hoạt động của tổng đài bao gồm các chức năng:</p>
<p> - Xử lý các trạng thái cuộc gọi của thuê bao, trung kế CO/ĐKX, trung kế luồng E1.</p>
<p>- Định tuyến cuộc gọi và chuyển mạch cấp âm hiệu, thông thoại giữa các thuê bao, trung kế CO/ĐKX, kênh thoại
    luồng E1.</p>
<p>- Thực hiện các dịch vụ của tổng đài.</p>
<p>- Trao đổi thông tin với các bảng mạch thuê bao, trung kế CO/ĐKX, luồng E1.</p>
<p>- Trao đổi thông tin với phần mềm trên máy tính PC qua giao diện RS232.</p>
<h5>b) Giao diện mặt bảng mạch CPU</h5>
<img src="/storage/images/cpu1.png" class="img" />

<table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -500px; left: 550px;">
    <tr>
        <td style="width: 60px;">(1)</td>
        <td>
            <p style="width: 540px;">Tên bảng mạch.</p>
        </td>
    </tr>
    <tr>
        <td style="width: 60px;">(2)</td>
        <td>
            <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                đài.</p>
        </td>
    </tr>
    <tr>
        <td style="width: 60px;">(3)</td>
        <td>
            <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
        </td>
    </tr>
    <tr>
        <td style="width: 60px;">(4)</td>
        <td>
            <p style="width: 540px;">Nút nhấn Reset bảng mạch. Khi tác động nhấn nhả nút này bảng mạch CPU sẽ hoạt
                động lại từ đầu.</p>
        </td>
    </tr>
    <tr>
        <td style="width: 60px;">(5)</td>
        <td>
            <p style="width: 540px;">Giao diện dùng cho chế độ kiểm tra chuyên sâu hoặc chuyển hệ thống về trạng
                thái mặc định.</p>
        </td>
    </tr>
    <tr>
        <td style="width: 60px;">(6)</td>
        <td>
            <p style="width: 540px;">Giao diện cấu hình cho tổng đài, theo chuẩn RS232.</p>
        </td>
    </tr>
</table>


<h5 style="margin-top: -300px;">c) Giao diện bảng mạch CPU</h5>
<img src="/storage/images/cpu4.png" class="img" id="styledImage" style="" usemap="#image-map1" />
<map name="image-map1">

    <map name="image-map1">
        <area target="" alt="" title="Phiên bản quản lý mạch in của nhà sản xuất." href="" coords="772,136,25"
            shape="circle">
        <area target="" alt="" title="Vị trí lắp lẫy đóng lắp bảng mạch." href="" coords="662,54,27" shape="circle">
        <area target="" alt="" title="Vị trí lắp lẫy đóng lắp bảng mạch." href="" coords="99,47,29" shape="circle">
        <area target="" alt="" title="Khe cắm ISA." href="" coords="762,517,31" shape="circle">
        <area target="" alt="" title="Nút nhấn Reset." href="" coords="419,42,28" shape="circle">
        <area target="" alt="" title="Giao diện cấu hình tổng đài." href="" coords="559,41,28" shape="circle">
        <area target="" alt="" title="Giao diện kiểm tra." href="" coords="  224,24,33" shape="circle">


    </map>


    <!-- <img src="./image/cpu2.png" alt="CPU"> -->
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Nút nhấn Reset</td>
            <td>
                <p>Nút nhấn Reset bảng mạch. Khi tác động nhấn nhả nút này bảng mạch CPU sẽ hoạt động lại từ đầu.</p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>Giao diện cấu hình tổng đài</td>
            <td>
                <p>Giao diện cấu hình cho tổng đài, theo chuẩn RS232.</p>
            </td>
        </tr>
        <tr>
            <td>(6)</td>
            <td>Giao diện kiểm tra</td>
            <td>
                <p>Giao diện dùng cho chế độ kiểm tra hoặc chuyển hệ thống về trạng thái mặc định.</p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch CPU</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn cung cấp</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC </p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>

            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <td>7</td>
        <td>Giao diện mạng cấu hình</td>
        <td>
            <p>RS232</p>
        </td>
        </tr>
        </tr>
        <td>8</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
        </tr>
        <td>9</td>
        <td>Bảo vệ</td>
        <td>
            <p>Chống quá áp</p>
        </td>
        </tr>
    </table>
    <h4>2. Cấu trúc bảng mạch E1</h4>
    <h5>a) Chức năng</h5>
    <p>Bảng mạch E1 trong tổng đài T64SIP đảm nhiệm chức năng tạo giao diện đấu nối luồng E1 với các giao diện E1 bên
        ngoài tổng đài, đồng thời trên bảng mạch E1 có một khối IPU cho phép thực hiện chuyển mạch các cuộc gọi liên
        quan đến IP.</p>
    <p> Bảng mạch E1 cho giao diện đấu nối ra bên ngoài là 2 luồng E1-120 Ω, chuẩn báo hiệu R2-MFC.</p>
    <p>Bảng mạch E1 trao đổi thông tin về vị trí khe, các trạng thái luồng E1 với bảng mạch CPU để thực hiện chức năng
        giám sát.</p>
    <p>Trạng thái đồng bộ luồng của bảng mạch E1 được báo hiệu bởi các đèn ở mặt trước của bảng mạch, hỗ trợ người dùng
        quan sát các trạng thái trong quá trình thao tác đấu nối với giao diện E1.</p>
    <h5>b) Giao diện mặt bảng mạch E1</h5>
    <img src="/storage/images/e11.png" class="img" />

    <!-- <img alt="Card CPU" src="./image/e11.png" style="display: block; width: 300px; height: auto; margin-left: 20px;"> -->
    <table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -422px; left: 550px;">
        <tr>
            <td style="width: 60px;">(1)</td>
            <td>
                <p style="width: 540px;">Tên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(2)</td>
            <td>
                <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                    đài.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(3)</td>
            <td>
                <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(4)</td>
            <td>
                <p style="width: 540px;">Đèn báo đồng bộ.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(5)</td>
            <td>
                <p style="width: 540px;">Nút kiểm tra đồng bộ.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(6)</td>
            <td>
                <p style="width: 540px;">Giao diện kết nối với khối IPU</p>
            </td>
        </tr>
    </table>
    <h5 style="margin-top: -260px;">c) Giao diện bảng mạch E1</h5>
    <img src="/storage/images/e111.png" class="img" />

    <!-- <img src="./image/e111.png" alt="CPU"> -->
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Nút nhấn kiểm tra</td>
            <td>
                <p>Dùng để kiểm tra đồng bộ các luồng E1 trên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>Đèn báo trạng thái đồng bộ</td>
            <td>
                <p>Đèn báo trạng thái đồng bộ của vị trí luồng tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(6)</td>
            <td>Vùng gắn khối IPU</td>
            <td>
                <p> </p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch E1</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn cung cấp</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC </p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>
                <p>+ Nguồn +12V : (10 ÷ 13.5) VDC</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <td>7</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
        </tr>
        <td>8</td>
        <td>Bảo vệ</td>
        <td>
            <p>Chống quá áp</p>
        </td>
        </tr>
    </table>
    <h4>3. Cấu trúc bảng mạch SUB</h4>
    <h5>a) Chức năng</h5>
    <p>Xử lý các trạng thái liên quan đến đường dây thuê bao.</p>
    <p> - Nhận biết tín hiệu nhấc máy và điều khiển cấp dòng khi xác định thuê bao nhấc máy.</p>
    <p> - Điều khiển Relay cấp điện áp chuông cho thuê bao khi có cuộc gọi đến.</p>
    <p> - Điều khiển đóng/mở cổng kết nối âm hiệu, thoại.</p>
    <p> - Nhận biết tín hiệu chuông do máy từ thạch tạo ra.</p>
    <p> - Nhận số quay Pulse tạo ra từ điện thoại.</p>
    <p> - Trao đổi dữ liệu với bảng mạch CPU qua giao tiếp SPI.</p>
    <p>Bảng mạch SUB có tính năng chạy tự động khi cắm nóng vào các vị trí khe thuê bao tương ứng. Các thông tin như vị
        trí khe, trạng thái thuê bao, đều được trao đổi với bảng mạch CPU để thực hiện nhiệm vụ điều khiển và quản lý.
    </p>
    <p>Ngoài việc giao tiếp với các máy điện thoại đầu cuối, các cổng thuê bao còn giao tiếp với các Modem quay số trong
        việc truyền số liệu chẳng hạn truyền file, truyền nhận fax.</p>
    <h5>b) Giao diện mặt bảng mạch SUB</h5>
    <img src="/storage/images/sub.png" class="img" />

    <!-- <img alt="Card CPU" src="./image/sub.png" style="display: block; width: 300px; height: auto; margin-left: 20px;"> -->
    <table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -350px; left: 550px;">
        <tr>
            <td style="width: 60px;">(1)</td>
            <td>
                <p style="width: 540px;">Tên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(2)</td>
            <td>
                <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                    đài.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(3)</td>
            <td>
                <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(4)</td>
            <td>
                <p style="width: 540px;">Các đèn báo hiệu các trạng thái thuê bao. Có 8 đèn tương ứng với 8 thuê bao
                    trên bảng mạch. Vị trí đèn trên cùng tương ứng vị trí thuê bao đầu tiên của bảng mạch.</p>
            </td>
        </tr>
    </table>
    <h5 style="margin-top: -200px;">c) Giao diện bảng mạch SUB</h5>
    <img src="/storage/images/sub1.png" class="img" />

    <!-- <img src="./image/sub1.png" alt="CPU"> -->
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Đèn báo trạng thái thuê bao</td>
            <td>
                <p>Có 8 đèn dùng báo hiệu các trạng thái của 8 thuê bao tương ứng như nhấc máy, đổ chuông … Trạng thái
                    thuê bao người dùng có thể giám sát trên giao diện giám sát cấu hình.</p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch SUB</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn cung cấp</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC </p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>
                <p>+ Nguồn +12V : (10 ÷ 13.5) VDC</p>
                <p>+ Nguồn -48V : (-45 ÷-49) VDC</p>
                <p>+ Nguồn chuông : (70÷80) VAC</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <td>7</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
        </tr>
        <td>8</td>
        <td>Bảo vệ</td>
        <td>
            <p>Chống quá áp</p>
        </td>
        </tr>
    </table>
    <h4>4. Cấu trúc bảng mạch EXT</h4>
    <h5>a) Chức năng</h5>
    <p>Bảng mạch EXT tích hợp 4 trung kế CO và 4 trung kế ĐKX.</p>
    <p> Trung kế CO được kết nối đến tổng đài đối thông qua cổng thuê bao của tổng đài đó và xử lý các tín hiệu.</p>
    <p> + Nhận biết có kết nối bên ngoài.</p>
    <p>+ Nhận biết có chuông gọi vào.</p>
    <p>+ Nhận tín hiệu đảo cực.</p>
    <p> Trung kế ĐKX được thiết kế làm trung kế để đấu nối với các tổng đài nhân công dùng máy từ thạch. Ngoài ra, trung
        kế này có thể đấu với cửa ĐKX của các điện đài vô tuyến sóng cực ngắn như P105, P109 hoặc thông qua một bộ ĐKX
        bên ngoài để điều khiển các điện đài vô tuyến khác. Trung kế ĐKX xử lý các tín hiệu:</p>
    <p> + Nhận biết có chuông gọi vào.</p>
    <p>+ Điều khiển đóng ngắt Relay để chuyển từ chế độ thu sang chế độ phát và ngược lại. </p>
    <p>Trao đổi dữ liệu với bảng mạch CPU qua giao tiếp SPI.</p>
    <h5>b) Giao diện mặt bảng mạch EXT</h5>
    <img src="/storage/images/ext1.png" class="img" />

    <!-- <img alt="Card CPU" src="./image/ext1.png" style="display: block; width: 300px; height: a5uto; margin-left: 20px;"> -->
    <table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -400px; left: 550px;">
        <tr>
            <td style="width: 60px;">(1)</td>
            <td>
                <p style="width: 540px;">Tên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(2)</td>
            <td>
                <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                    đài.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(3)</td>
            <td>
                <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(4)</td>
            <td>
                <p style="width: 540px;">Đèn báo hiệu các trạng thái trung kế. Bốn đèn phía trên tương ứng với 04 đường
                    trung kế CO 1-4 và 04 đèn phía dưới tương ứng 04 đường trung kế ĐKX 1-4.</p>
            </td>
        </tr>
    </table>
    <h5 style="margin-top: -200px;">c) Giao diện bảng mạch EXT</h5>
    <img src="/storage/images/ext11.png" class="img" />

    <!-- <img src="./image/ext11.png" alt="CPU"> -->
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Đèn báo trạng thái trung kế CO, ĐKX</td>
            <td>
                <p>Có 8 đèn dùng báo hiệu các trạng thái của các đường trung kế CO và ĐKX</p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch EXT</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn cung cấp</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC </p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>
                <p>+ Nguồn +12V : (10 ÷ 13.5) VDC</p>
                <p>+ Nguồn -48V : (-45 ÷-49) VDC</p>
                <p>+ Nguồn chuông : (70÷80) VAC</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <td>7</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
        </tr>
        <td>8</td>
        <td>Bảo vệ</td>
        <td>
            <p>Chống quá áp</p>
        </td>
        </tr>
    </table>
    <h4>5. Cấu trúc bảng mạch IPX</h4>
    <h5>a) Chức năng</h5>
    <p>Bảng mạch truyền số liệu IPX thực hiện truyền dữ liệu từ các thiết bị đầu cuối có giao diện IP qua giao diện
        luồng E1. Thay vì truyền số liệu một cách thông thường dùng Modem quay số giữa các tổng đài thì bảng mạch IPX hỗ
        trợ đường truyền dùng IP. Điều này mang lại sự thuận tiện cho việc truyền số liệu cho các đầu cuối có chuẩn IP
        qua hệ thống tổng đài có kết nối luồng E1.</p>
    <p>Bảng mạch IPX được thiết kế có vị trí cắm tương thích với vị trí bảng mạch thuê bao, do đó khi cắm vào tổng đài
        thì bảng mạch IPX được nhận diện và quản lý như một bảng mạch thuê bao bình thường. Khi đó bảng mạch IPX được
        quản lý về quỹ số, các trạng thái như thuê bao thông thường, v.v...</p>
    <p> Bảng mạch IPX hỗ trợ 2 hướng truyền dữ liệu khác nhau cho các thiết bị đầu cuối và dùng chung tài nguyên là số
        kênh truyền, tối đa 8 kênh, xấp xỉ 64Kb/s/1 kênh truyền.</p>
    <p>Ưu điểm của bảng mạch IPX là linh hoạt trong truyền dữ liệu như chế độ chọn kênh, phân hoạch số kênh truyền theo
        hướng, tăng tốc độ truyền số liệu do tập hợp nhiều kênh truyền vào 01 hướng. Như vậy so với cách thức truyền số
        liệu dùng Modem quay số ta chỉ dùng được 1 kênh truyền với tốc độ tối đa 64Kb/s thì bảng mạch truyền số liệu có
        ưu điểm vượt trội là có thể truyền được một lúc nhiều kênh, tăng tốc độ truyền cho người dùng.</p>
    <p><strong>Lưu ý:</strong> Khi sử dụng bảng mạch IPX là chế độ cấu hình được lưu vào vùng nhớ lưu trữ được, do đó
        các kênh truyền khi
        không sử dụng phải ở chế độ không cho phép thực hiện chiếm kênh truyền.</p>
    <h5>b) Giao diện mặt bảng mạch IPX</h5>
    <img src="/storage/images/ipx1.png" class="img" />

    <!-- <img alt="Card CPU" src="./image/ipx1.png" style="display: block; width: 300px; height: auto; margin-left: 20px;"> -->
    <table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -422px; left: 550px;">
        <tr>
            <td style="width: 60px;">(1)</td>
            <td>
                <p style="width: 540px;">Tên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(2)</td>
            <td>
                <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                    đài.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(3)</td>
            <td>
                <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(4)</td>
            <td>
                <p style="width: 540px;">Đèn báo các trạng thái kênh truyền.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(5)</td>
            <td>
                <p style="width: 540px;">Đèn báo hướng truyền số liệu thành công.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(6)</td>
            <td>
                <p style="width: 540px;">Nút nhấn Reset bảng mạch</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(7)</td>
            <td>
                <p style="width: 540px;">Hai cổng truyền số liệu, chuẩn Ethernet 10/100 Mb/s</p>
            </td>
        </tr>
    </table>
    <h5 style="margin-top: -200px;">c) Giao diện bảng mạch IPX</h5>
    <img src="/storage/images/ipx11.png" class="img" />

    <!-- <img src="./image/ipx11.png" alt="CPU"> -->
    <table style="margin-top: 20px;">
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Nút nhấn Reset bảng mạch</td>
            <td>
                <p>Nhấn nhả nút này bảng mạch sẽ hoạt động lại từ đầu.</p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>Đèn báo các trạng thái kênh truyền</td>
            <td>
                <p>Các đèn báo trạng thái này tương ứng với trạng thái của thuê bao tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(6)</td>
            <td>Đèn báo hướng truyền số liệu thành công</td>
            <td>
                <p>Có 02 đèn báo trạng thái tương ứng cho 02 hướng kết nối Link1 và kết nối Link2.</p>
            </td>
        </tr>
        <tr>
            <td>(7)</td>
            <td>Hai cổng truyền số liệu, chuẩn Ethernet 10/100 Mb/s</td>
            <td>
                <p>Có 02 cổng IPX1 và IPX2 tương ứng với hai hướng truyền khác nhau.</p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch IPX</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn cung cấp</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC </p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>
                <p>+ Nguồn +12V : (10 ÷ 13.5) VDC</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <td>7</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
        </tr>
        <td>8</td>
        <td>Bảo vệ</td>
        <td>
            <p>Chống quá áp</p>
        </td>
        </tr>
    </table>
    <h4>6. Cấu trúc bảng mạch PWR</h4>
    <h5>a) Chức năng</h5>
    <p>Bảng mạch nguồn PWR SUB là bảng mạch có nhiệm vụ tiếp nhận nguồn đầu vào theo chuẩn nguồn viễn thông -48VDC của
        hệ thống nguồn nhà trạm và chuyển đổi thành các nguồn khác nhau cho các bảng mạch của tổng đài.</p>
    <p>Đầu ra của bảng mạch nguồn PWR bao gồm: +5VDC, -5VDC, +12VDC, -48VDC, 75VAC bảo đảm công suất cho các bảng mạch
        tổng đài hoạt động.</p>
    <p> Bảng mạch nguồn PWR hỗ trợ giao diện hiển thị bằng LED trực quan cho người dùng trong quá trình hoạt động. Ví
        dụ: Báo cảnh các nguồn đầu vào, đầu ra, báo cảnh nguồn thấp, mất nguồn cục bộ.</p>
    <p>Một số trường hợp bảng mạch nguồn khóa nguồn đầu ra và báo cảnh trên mặt bảng mạch các nguồn bị khóa. Người dùng
        có thể nhấn nút Reset trên mặt bảng mạch để bảng mạch nguồn hoạt động trở lại khi đảm bảo nguồn vào.</p>
    <p>Bảng mạch nguồn PWR hoạt động có dự phòng 1+1. Các đầu ra của hai bảng mạch nguồn hoạt động song song nhằm duy
        trì cấp nguồn đầu ra, đảm bảo tổng đài được cấp nguồn liên tục khi thay thế hoặc có sự cố lỗi một bảng mạch
        nguồn.</p>
    <p>Bảng mạch nguồn được làm mát bằng quạt tản nhiệt chạy liên tục với tuổi thọ bền, đảm bảo làm mát cho khối công
        suất trên bảng mạch làm việc tốt, duy trì nguồn đầu ra ổn định.</p>
    <h5>b) Giao diện mặt bảng mạch PWR</h5>
    <img src="/storage/images/pwr.png" class="img" />

    <!-- <img alt="Card CPU" src="./image/pwr.png" style="display: block; width: 300px; height: auto; margin-left: 20px;"> -->
    <table style="display: block; width: 650px; margin-right: 20px; position: relative; top: -400px; left: 550px;">
        <tr>
            <td style="width: 60px;">(1)</td>
            <td>
                <p style="width: 540px;">Tên bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(2)</td>
            <td>
                <p style="width: 540px;">Cơ cấu ốc dính liền mặt nạ bảng mạch, dùng để cố định bảng mạch vào khung tổng
                    đài.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(3)</td>
            <td>
                <p style="width: 540px;">Cơ cấu căm/rút Card.</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(4)</td>
            <td>
                <p style="width: 540px;">Hiển thị các trạng thái trong quá trình của nguồn như lỗi (ERR), nguồn vào
                    (VIN), các nguồn cục bộ (-5V, +5V, +12V), nguồn đường dây -48V, nguồn cấp chuông 75VAC, trạng thái
                    của bảng mạch (RUN).</p>
            </td>
        </tr>
        <tr>
            <td style="width: 60px;">(5)</td>
            <td>
                <p style="width: 540px;">Nút nhấn Reset bảng mạch</p>
            </td>
        </tr>
    </table>
    <h5 style="margin-top: -250px;">c) Giao diện bảng mạch PWR</h5>
    <img src="/storage/images/pwr1.png" class="img" />

    <!-- <img src="./image/pwr1.png" alt="CPU"> -->
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Vị trí lắp lẫy đóng lắp bảng mạch</td>
            <td>
                <p>Lẫy được lắp vào bảng mạch, tương tác với khung tổng đài hỗ trợ tháo lắp bảng mạch.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Khe cắm ISA</td>
            <td>
                <p>Dùng để cắm vào bảng mạch đáy tổng đài với vị trí tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Nút nhấn Reset bảng mạch</td>
            <td>
                <p>Nhấn nhả nút này bảng mạch sẽ hoạt động lại từ đầu.</p>
            </td>
        </tr>
        <tr>
            <td>(5)</td>
            <td>Đèn hiển thị mặt trước bảng mạch</td>
            <td>
                <p>Hiển thị các trạng thái trong quá trình của nguồn như lỗi (ERR), nguồn vào (VIN), các nguồn cục bộ
                    (-5V, +5V, +12V), nguồn đường dây -48V, nguồn cấp chuông 75VAC, trạng thái của bảng mạch (RUN).</p>
            </td>
        </tr>
        <tr>
            <td>(6)</td>
            <td>Quạt tản nhiệt</td>
            <td>
                <p>Tản nhiệt cục bộ từ bảng mạch ra hệ thống tản nhiệt chung cho tổng đài. Quạt tản nhiệt luôn hoạt động
                    khi có nguồn cấp.</p>
            </td>
        </tr>
    </table>
    <h5>d) Thông số kỹ thuật bảng mạch PWR</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nguồn vào</td>
            <td>
                <p>Nguồn -48V : (-45 ÷ -56)VDC</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Nguồn ra</td>
            <td>
                <p>+ Nguồn +5V : (4.7 ÷ 5.3) VDC</p>
                <p>+ Nguồn -5V : (-4.7 ÷ -5.3) VDC</p>
                <p>+ Nguồn +12V : (10 ÷ 13.5) VDC</p>
                <p>+ Nguồn -48V : (-45 ÷-49) VDC</p>
                <p>+ Nguồn chuông : (70÷80) VAC</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Giao diện hiển thị</td>
            <td>
                <p>Đèn trạng thái mặt nạ bảng mạch</p>
            </td>
        </tr>
        <td>9</td>
        <td>Khởi động bảng mạch</td>
        <td>
            <p>Bảng mạch tự khởi động</p>
        </td>
        </tr>
    </table>
    <h4>7. Cấu trúc bảng mạch BA</h4>
    <h5>a) Chức năng</h5>
    <p>Bảng mạch bảo an BA mục đích để bảo vệ các mạch thuê bao hay trung kế bên trong, hạn chế các nguy hiểm khi xảy ra
        hiện tượng điện áp cao như chạm chập điện, sét… vào đường dây thuê bao, trung kế.</p>
    <h5>b) Giao diện mặt bảng mạch BA</h5>
    <img src="/storage/images/ba1.png" class="img" />

    <!-- <img alt="" src="./image/ba1.png" style="display: block; width: 800px; height: auto; margin-left: 0px;"> -->
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>(1)</td>
            <td>Phiên bản phần cứng</td>
            <td>
                <p>Phiên bản quản lý mạch in của nhà sản xuất.</p>
            </td>
        </tr>
        <tr>
            <td>(2)</td>
            <td>Jack nối đường dây</td>
            <td>
                <p>Jack tương thích với cáp IDE40, dùng nối dài đường dây từ bảng mạch đáy ra bảng mạch bảo an.</p>
            </td>
        </tr>
        <tr>
            <td>(3)</td>
            <td>Jack DB36 đấu dây</td>
            <td>
                <p>Mỗi Jack DB36 thuê bao hay trung kế sẽ có 16 line tương ứng.</p>
            </td>
        </tr>
        <tr>
            <td>(4)</td>
            <td>Giao diện kết nối luồng E1</td>
            <td>
                <p>Giao diện có kết cấu nhấn nhả dạng Domino hoặc DB25, rất linh hoạt đấu nối trong nhà trạm hay khai
                    thác dã chiến.</p>
            </td>
        </tr>
    </table>

    <h5 style="margin-top: 30px;">c) Thông số kỹ thuật bảng mạch BA</h5>
    <table>
        <tr>
            <th style="width: 10%;">TT</th>
            <th style="width: 35%;">Mô tả vị trí</th>
            <th>Mô tả chức năng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Số lớp mạch in</td>
            <td>
                <p>02 lớp</p>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tiêu chuẩn mạch in</td>
            <td>
                <p>Phủ xanh, mạ vàng</p>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Độ dày mạch in</td>
            <td>
                <p>1,6mm</p>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kích thước mạch in</td>
            <td>
                <p>D x R = 298 x 230 mm</p>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Chỉ tiêu hoạt động</td>
            <td>
                <p>Hoạt động liên tục 24/24</p>
            </td>
        </tr>

    </table>
