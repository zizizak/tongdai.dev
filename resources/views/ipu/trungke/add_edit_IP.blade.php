<div class="ipu_form add_edit_ipu_trungke_ip">
<fieldset>
    <legend>Thông tin trung kế IP</legend>

    <div class="main-form">
    <form id="add_edit_ipu_trungke_ip">
        <input type="hidden" name="trungke_ip_id" id="trungke_ip_id" value="0" />
        <input type="hidden" name="task" value="insert_update_trungke_ip" />
        <fieldset>
            <legend>Thông số chung</legend>
            <div class="form-row">
                <div class="form-element form-w-50">
                    <label class="label_ten">Tên trung kế</label>
                    <input type="text" name="tentrungke" id="tentrungke" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Tài khoản</label>
                    <input type="text" name="taikhoan" id="taikhoan" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Địa chỉ kết nối</label>
                    <input type="text" name="diachiketnoi" id="diachiketnoi" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Mật khẩu</label>
                    <input type="text" name="matkhau" id="matkhau" class="form-control" required>
                </div>
                <div class="clear clearfix"
            </div>
        </fieldset>

        <fieldset>
            <legend>Chuẩn báo hiệu</legend>
            <label class="form-check-label" for="chuanbaohieu_sip">
                <input type="radio" class="form-check-input" id="chuanbaohieu_sip" name="chuanbaohieu" value="sip" checked>SIP
            </label>
            <label class="form-check-label" for="chuanbaohieu_iax">
                <input type="radio" class="form-check-input" id="chuanbaohieu_iax" name="chuanbaohieu" value="iax">IAX
            </label>
        </fieldset>

        <fieldset>
            <legend>Mã thoại</legend>
            @php
                $ar_ma_thoai = ["none", "Ulaw", "Alaw", "Gsm", "g726", "adpcm", "Ipc10"];
            @endphp

            <label for="">Thứ 1</label>
                @php
                    $current_select = "Ulaw";
                    $name = "thu1";
                    $id = "thu1";
                    echo generateSelect($name, $id, $ar_ma_thoai, $current_select);
                @endphp
                <label for="">Thứ 2</label>
                @php
                    $current_select = "Alaw";
                    $name = "thu2";
                    $id = "thu2";
                    echo generateSelect($name, $id, $ar_ma_thoai, $current_select);
                @endphp

                <label for="">Thứ 3</label>
                @php
                    $current_select = "none";
                    $name = "thu3";
                    $id = "thu3";
                    echo generateSelect($name, $id, $ar_ma_thoai, $current_select);
                @endphp

                <label for="">Thứ 4</label>
                @php
                    $current_select = "none";
                    $name = "thu4";
                    $id = "thu4";
                    echo generateSelect($name, $id, $ar_ma_thoai, $current_select);
                @endphp

                <label for="">Thứ 5</label>
                @php
                    $current_select = "none";
                    $name = "thu5";
                    $id = "thu5";
                    echo generateSelect($name, $id, $ar_ma_thoai, $current_select);
                @endphp
        </fieldset>

        <fieldset>
            <legend>Sử dụng Outbound Proxy</legend>
            <label class="form-check-label" for="outboundproxy_khong">
                <input type="radio" class="form-check-input" id="outboundproxy_khong" name="outboundproxy" value="khong" checked>Không
            </label>

            <label class="form-check-label" for="outboundproxy_co">
                <input type="radio" class="form-check-input" id="outboundproxy_co" name="outboundproxy" value="co">Có
            </label>
        </fieldset>

    </form>
</div>

<div class="che_do_lam_viec">
    <fieldset class="right">
        <legend>Chế độ làm việc</legend>
        <div>
            <label><input type="radio" name="rd_chedo" value="xem_sua_xoa" checked=true> Xem / sửa / xóa </label><br>
            <label><input type="radio" name="rd_chedo" value="them"> Thêm</label>
        </div>
        <input class="button sua" type="button" value="Sửa" id="form_sua">
        <input class="button xoa"  type="button" value="Xóa" id="form_xoa">
        <input class="button" type="button" value="Thêm" id="form_them">
    </fieldset>
</div>
<div class="clear clearfix"></div>

</fieldset>
</div>
