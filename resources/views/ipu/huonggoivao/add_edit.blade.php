<div class="ipu_form add_edit_ipu_huonggoivao">
<fieldset>
    <legend>Thông tin Hướng gọi ra</legend>

    <div class="main-form">
    <form id="add_edit_ipu_huonggoivao">
        <input type="hidden" name="update_id" id="update_id" value="0" />
        <input type="hidden" name="task" value="insert_update_huonggoivao" />
        <fieldset>
            <legend>Thông số chung</legend>
            <div class="form-row">
                <div class="form-element form-w-50">
                    <label class="label_ten">Trung kế</label>
                    @php
                        $ar_trungke = array();
                        foreach ($list_trungke_ip as $key => $item) {
                            $ar_trungke["IP_" . $item['id']] = $item['tentrungke'];
                        }
                        foreach ($list_trungke_e1 as $key => $item) {
                            $ar_trungke["E1_" . $item['id']] = $item['tentrungke'];
                        }
                        $current_select = "";
                        $name = "trungke_id";
                        $id = "trungke_id";
                        echo generateSelectV2($name, $id, $ar_trungke, $current_select);
                    @endphp
                </div>
                <div class="form-element form-w-50">
                    <label class="label_ten">Đầu số gọi vào</label>
                    <input type="text" name="dausogoivao" id="dausogoivao" class="form-control" required>
                </div>
                <div class="clear clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>Xử lý cuộc gọi</legend>
            <div class="tabs">
                <ul class="tab-header">
                    <li data-tab="dialplan_tab" class="active">Chuyển thuê bao nhận</li>
                    <li data-tab="chuyentiep_tab">Chuyển tiếp cuộc gọi</li>
                    <li data-tab="chancuocgoi_tab">Chặn cuộc gọi</li>
                </ul>
                <div class="tab-content">
                    <div class="tab active" id="dialplan_tab">
                        <label class="label_ten">Chọn Dial Plan</label>
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
                    <div class="tab" id="chuyentiep_tab">
                       Chưa hỗ trợ
                    </div>
                    <div class="tab" id="chancuocgoi_tab">
                        Chưa hỗ trợ
                    </div>
                </div>
            </div>
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
