<div class="ipu_form add_edit_ipu_dialplan">
<fieldset>
    <legend>Thông tin Dial Plan</legend>

    <div class="main-form" style="min-height:200px;">
    <form id="add_edit_ipu_dialplan">
        <input type="hidden" name="update_id" id="update_id" value="0" />
        <input type="hidden" name="task" value="insert_update_dialplan" />
        <div class="form-row">
            <div class="form-element form-w-50">
                <div class="">
                    <label class="label_ten">Tên dialplan</label>
                    <input type="text" name="tendialplan" id="tendialplan" class="form-control" required>
                </div>
                <fieldset>
                    <legend>Dịch vụ</legend>
                    <div><input type="checkbox" name="goinoidai" id="goinoidai" class="form-control" value="1"><label for="goinoidai">Gọi nội đài</label></div>
                    <div><input type="checkbox" name="goihangdoi" id="goihangdoi" class="form-control" value="1"><label for="goihangdoi">Gọi hàng đợi</label></div>
                    <div><input type="checkbox" name="goihoinghi" id="goihoinghi" class="form-control" value="1"><label for="goihoinghi">Gọi hội nghị</label></div>
                </fieldset>
            </div>
            <div class="form-element form-w-50">
                <fieldset>
                    <legend>Hướng gọi ra</legend>
                    @foreach ($huonggoiras as $item)
                        <div>
                            <input type="checkbox" name="id_huonggoira[]" id="id_huonggoira_{{ $item['id'] }}" value="{{ $item['id'] }}" class="form-control">
                            <label for="id_huonggoira_{{ $item['id'] }}">{{ $item['tenhuonggoira'] }}</label>
                        </div>
                    @endforeach
                </fieldset>
            </div>
            <div class="clear clearfix"></div>
        </div>
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
