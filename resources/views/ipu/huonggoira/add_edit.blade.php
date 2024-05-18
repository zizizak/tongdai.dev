<div class="ipu_form add_edit_ipu_huonggoira">
<fieldset>
    <legend>Thông tin Hướng gọi ra</legend>

    <div class="main-form">
    <form id="add_edit_ipu_huonggoira">
        <input type="hidden" name="update_id" id="update_id" value="0" />
        <input type="hidden" name="task" value="insert_update_huonggoira" />
        <fieldset>
            <legend>Thông số chung</legend>
            <div class="form-row">
                <div class="form-element form-w-50">
                    <label class="label_ten">Tên hướng gọi ra</label>
                    <input type="text" name="tenhuonggoira" id="tenhuonggoira" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Đầu số quay</label>
                    <input type="text" name="dausoquay" id="dausoquay" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Số chủ gọi</label>
                    <input type="text" name="sochugoi" id="sochugoi" class="form-control" required>
                </div>
                <div class="clear clearfix"
            </div>
        </fieldset>
        <fieldset>
            <legend>Cấu hình hướng gọi ra</legend>
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
                    <label for="">Digit chèn vào</label>
                    <input type="text" name="digitchenvao" id="digitchenvao" class="form-control" required>
                </div>
                <div class="form-element form-w-50">
                    <label for="">Digit bị chặn</label>
                    <input type="text" name="digitbichan" id="digitbichan" class="form-control" required>
                </div>
                <div class="clear clearfix"
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
