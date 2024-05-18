<div class="ipu_form add_edit_ipu_thuebaoip">
<fieldset>
    <legend>Thông tin thuê bao</legend>

    <div class="main-form" style="min-height:200px;">
    <form id="add_edit_ipu_thuebaoip">
        <input type="hidden" name="update_id" id="update_id" value="0" />
        <input type="hidden" name="task" value="insert_update_thuebaoip" />

        <fieldset>
            <legend>Thông số chung</legend>
            <div class="form-row">
                <div class="form-element form-w-50">
                    <label class="label_ten">Số thuê bao</label>
                    <input type="text" name="sothuebao" id="sothuebao" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Tên thuê bao</label>
                    <input type="text" name="tenthuebao" id="tenthuebao" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Dial Plan</label>
                    @php
                        $ar_dialplan = array();
                        foreach ($dialplans as $key => $item) {
                            $ar_dialplan[$item['id']] = $item['tendialplan'];
                        }
                        $current_select = "";
                        $name = "id_dialplan";
                        $id = "id_dialplan";
                        echo generateSelectV2($name, $id, $ar_dialplan, $current_select);
                    @endphp
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
            <label class="form-check-label" for="baohieu_sip">
                <input type="radio" class="form-check-input" id="baohieu_sip" name="baohieu" value="sip" checked>SIP
            </label>
            <label class="form-check-label" for="baohieu_iax">
                <input type="radio" class="form-check-input" id="baohieu_iax" name="baohieu" value="iax">IAX
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
            <legend>Cài đặt VoIP</legend>
            <div class="voip-group-element">
                <input type="checkbox" name="nat" id="nat" class="form-control" value="1">
                <label for="nat">NAT</label>
            </div>
            <div class="voip-group-element">
                <label>DTMF mode</label>
                <select name="dtmf" id="dtmf"><option value="rfc2833">rfc2833</option></select>
            </div>
            <div class="voip-group-element">
                <label>Insecure</label>
                <select name="insecure" id="insecure"><option value="no">no</option><option value="yes">yes</option></select>
            </div>
            <div class="voip-group-element">
                <label>Can Reinvite</label>
                <select name="canreinvete" id="canreinvete"><option value="no">no</option><option value="yes">yes</option></select>
            </div>
            <div class="voip-group-element">
                <input type="checkbox" name="isagent" id="isagent" class="form-control" value="1">
                <label for="isagent">Is Agent</label>
            </div>
            <div class="voip-group-element">
                <label>Pickup Group</label>
                <select name="pickgroup" id="pickgroup"><option value="1">1</option><option value="2">2</option></select>
            </div>
            <div class="voip-group-element">
                <input type="checkbox" name="voicemail" id="voicemail" class="form-control" value="1">
                <label for="voicemail">Voice mail</label>
            </div>
            <div class="clear clearfix"></div>
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
