<h4 style=" margin-top: 10px">I. GIẢI THÍCH CÂU LỆNH KHAI BÁO KHỐI TDM BẰNG PO</h4>
<h5 style="margin-top: 20px;">1) CÁC CÂU LỆNH KIỂM TRA</h5>

<table style="margin-top: 20px;">
    <tr>
        <th style="width: 10%;">TT</th>
        <th style="width: 45%;">Cú pháp câu lệnh</th>
        <th>Mô tả chức năng</th>
    </tr>
    <tr>
        <td>1</td>
        <td>*60*X1X2#</td>
        <td>
            <p>Kiểm tra tham số trung kế CO/ĐKX: X1X2.</p>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>*61*X#</td>
        <td>
            <p>Kiểm tra tham số trung kế E1: X.</p>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td>*62*X1X2X3#</td>
        <td>
            <p>Kiểm tra tham số thuê bao: X1X2X3.</p>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>*63*X1X2X3Y#</td>
        <td>
            <p>Kiểm tra tham số mã hướng: X1X2X3 <br>(Y=0:Hiển thị mã định tuyến; Y = 1: Hiển thị đặc tính của mã định
                tuyến).</p>
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td>*64*X1X2#</td>
        <td>
            <p>Kiểm tra tham số hướng: X1X2.</p>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td>*65#</td>
        <td>
            <p>Kiểm tra cấu hình hoạt động.</p>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>*66#</td>
        <td>
            <p>Kiểm tra 3 số đầu danh bạ.</p>
        </td>
    </tr>
    <tr>
        <td>8</td>
        <td>*67#</td>
        <td>
            <p>Kiểm tra 3 số sau danh bạ đầu tiên.</p>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td> *68*X1X2#</td>
        <td>
            <p>Kiểm tra danh bạ bất kỳ <br>(X1: Vị trí bảng mạch (1-9)
                X2: Vị trí thuê bao trên bảng mạch (1÷8)
                ).</p>
        </td>
    </tr>
</table>
<h5 style="margin-top: 20px;">2) CÁC CÂU LỆNH KHAI BÁO</h5>
<table style="margin-top: 20px;">
    <tr>
        <th style="width: 10%;">TT</th>
        <th style="width: 45%;">Cú pháp câu lệnh</th>
        <th>Mô tả chức năng</th>
    </tr>
    <tr>
        <td>1</td>
        <td>*36*XXXY1Y2Y3Y4#</td>
        <td>
            <p>Khai báo (đổi) đặc tính cho TB: XXX.</p>
            <p>Y1: Class(0 - 5)</p>
            <p>Y2: Đặc tính thuê bao (0-7)</p>
            <p>Y3: Độ ưu tiên (0-9)</p>
            <p>Y4: Loại TB (0: Tự động, 1: Từ thạch)</p>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>*38*y1y2y3x1x2x3x4x5x6#</td>
        <td>
            <p>Khai báo các tham số trong bảng mã hướng
                <br>(Y1Y2Y3: Số thứ tự trong bảng mã định tuyến<br>
                X1: Số chặn (0-5)<br>
                X2: Số quay tối thiểu (1-5)<br>
                X3X4: Hướng gọi (tương ứng với các vị trí trong bảng nhóm trung kế, giá trị từ 0 đến 20)<br>
                X5: Tổng số mã định tuyến (1-4)<br>
                X6...: Mã định tuyến, thay đổi tùy theo tổng số mã định tuyến cần khai báo).
            </p>

        </td>
    </tr>
    <tr>
        <td>3</td>
        <td>*38* y1y2y3#</td>
        <td>
            <p>xóa 1 mã hướng y1y2y3.</p>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>*38#</td>
        <td>
            <p>xóa toàn bộ mã hướng.</p>
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td>*39*y1y2x1x2x3# </td>
        <td>
            <p>Khai báo các tham số trong bảng hướng <br>
                Y1Y2: Số thứ tự trong bảng Hướng (0 - 20)<br>
                X1: Loại hướng, 1: TKCO, 2: Luồng E1, 3: TKĐKX<br>
                X2X3...: Các thành phần thuộc hướng </p>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td>*39*y1y2# </td>
        <td>
            <p>xóa 1 hướng y1y2 </p>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>*39# </td>
        <td>
            <p>xóa toàn bộ hướng </p>
        </td>
    <tr>
        <td>8</td>
        <td>*40# </td>
        <td>
            <p>lưu các thông số vào cấu hình hiện tại (đang ở cấu hình 1 hoặc 2) </p>
    </tr>
    <tr>
        <td>9</td>
        <td>*40*x# </td>
        <td>
            <p>lưu các thông số vào cấu hình x </p>
        </td>
    </tr>
    <tr>
        <td>10</td>
        <td>*41*XXX# </td>
        <td>
            <p>Đổi 3 số đầu thành xxx </p>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td>*42*XXX# </td>
        <td>
            <p>Đổi 3 số sau thành xxx </p>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td>*44*YX1X2# </td>
        <td>
            <p>Khai báo thông số luồng E1<br>
                Y: Số thứ tự luồng (1-2)<br>
                X1: Hướng gọi của kênh <br>
                X2: chọn Clock Master hay Slave, 0: Slave, 1: Master
            </p>
        </td>
    </tr>
    <tr>
        <td>13</td>
        <td>*45*Y1Y2X1X2X3# </td>
        <td>
            <p>Đổi tham số trung kế CO <br>
                YY: Số thứ tự trung kế (01 - 08)<br>
                Trong đó: 01-04: Trung kế CO1-CO4;
                05-08: Trung kế ĐKX1-ĐKX4<br>
                X1: Quyền gọi, 0: Gọi vào, 1: Gọi vào/ra, 2: Khoá<br>
                X2: Loại trung kế, 0: TKCO, 1: TKĐKX<br>
                X3: Đặc tính trung kế
            </p>
        </td>
    </tr>
    <tr>
        <td>14</td>
        <td>*50*X# </td>
        <td>
            <p>Gọi cấu hình x </p>
        </td>
    </tr>
    <tr>
        <td>15</td>
        <td>*55*XXXYYY# </td>
        <td>
            <p>Đổi danh bạ xxx thành yyy </p>
        </td>
    </tr>

</table>

<h4 style="margin-top: 10px">II. THỨ TỰ KHAI BÁO KHỐI IPU BẰNG PHẦN MỀM (bắt buộc phải theo thứ tự)</h4>
<h5 style="margin-top: 10px; color:blue">1. Khai báo trung kế IP/E1</h5>
<h5 style="margin-top: 10px; color:blue">2. Khai báo hướng gọi ra</h5>
<h5 style="margin-top: 10px; color:blue">3. Khai báo Dial Plan</h5>
<h5 style="margin-top: 10px; color:blue">4. Khai báo hướng gọi vào</h5>
<h5 style="margin-top: 10px; color:blue">5. Khai báo thuê bao IP</h5>




</table>