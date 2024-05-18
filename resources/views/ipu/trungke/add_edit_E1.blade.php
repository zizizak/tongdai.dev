<div class="ipu_form add_edit_ipu_trungke_e1">
    <fieldset>
        <legend>Thông tin trung kế E1</legend>
        <div class="main-form">
        <form id="add_edit_ipu_trungke_e1">
            <input type="hidden" name="trungke_e1_id" id="trungke_e1_id" value="0" />
            <input type="hidden" name="task" value="insert_update_trungke_e1" />
            <fieldset>
                <legend>Thông số chung</legend>
                <label for="">Tên trung kế</label>
                <input type="text" name="tentrungke_e1" id="tentrungke_e1" required>
                <label for="">Chiều gọi các kênh</label>
                <select id="chieugoicackenh" name="chieugoicackenh" required>
                    <option>15 ra - 15 vào</option>
                    <option>15 vào - 15 ra</option>
                </select>
                <label for="">ID luồng</label>
                <select class="form-control" id="idluong" name="idluong" required>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Báo hiệu</legend>
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="radio1" name="baohieu" value="R2" checked>R2
                </label>

                <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="radio2" name="baohieu" value="SS7">SS7
                </label>
            </fieldset>
        </form>
    </div>
    <div class="che_do_lam_viec">
        <fieldset class="right">
            <legend>Chế độ làm việc</legend>
            <div>
                <label><input type="radio" name="rd_chedo_e1" value="xem_sua_xoa" checked=true> Xem / sửa / xóa </label><br>
                <label><input type="radio" name="rd_chedo_e1" value="them"> Thêm</label>
            </div>
            <input class="button sua" type="button" value="Sửa" id="form_sua_e1">
            <input class="button xoa"  type="button" value="Xóa" id="form_xoa_e1">
            <input class="button" type="button" value="Thêm" id="form_them_e1">
        </fieldset>
    </div>

</fieldset>
</div>
