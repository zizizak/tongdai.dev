<div class="window-modal" id="modal-cauhinhluongE1">
<div class="window-control">
    <div class="fl-left">
        <p class="app-name">Cấu hình luồng E1</p>
    </div>
    <div class="fl-right">
        <ul class="window-control-nav">
            <li><a href="#Minimum">_</a></li>
            <li><a href="#Maximum">#</a></li>
            <li class="form-button close-modal" data-id="modal-cauhinhluongE1"><a href="#Close">X</a></li>
        </ul>
    </div>
    <div class="clear clearfix"></div>
</div>
<div class="window-content">
    <div class="window-content-detail">


            <?php foreach ($trungkeE1s as $key => $item) {
            ?>

            <div class="row">
                <form class="form-e1" id="form-e1-<?php echo $item->id_stt ?>" data-modal-id="modal-cauhinhluongE1" >
                    <div class="element">
                    <?php echo " Luồng E1-" . $item->id_stt ?>
                    <input type="hidden" value="<?php echo $item->id_stt ?>" name="luong" />
                    </div>
                    <div class="element">
                        Vị trí b.đầu kênh gọi ra <input class="form-input input-small" name="vitri_batdau_goi_ra" type="text" value="<?php echo $item->vitri_batdau_goi_ra ?>" />
                    </div>
                    <div class="element">
                        Vị trí b.đầu kênh gọi vào <input class="form-input input-small" name="vitri_batdau_goi_vao"  type="text" value="<?php echo $item->vitri_batdau_goi_vao ?>" />
                    </div>
                    <div class="element">
                        Clock <select  class="form-select" name="clock">
                            <option value="0" <?php echo $item->clock == 0 ? 'selected="selected"' : ''; ?> >Slave</option>
                            <option value="1" <?php echo $item->clock == 1 ? 'selected="selected"' : ''; ?> >Master</option>
                        </select>
                    </div>
                    <div class="element">
                        <input type="hidden" name="task" value="trungkeE1" />
                        <input class="form-button" type="submit" value="Chọn xong"/>
                    </div>
                </form>
            </div>

            <?php
            }
            ?>
            <div class="row row-last">
                <input class="form-button close-modal" data-id="modal-cauhinhluongE1" type="button" value="Thoát"/>
            </div>

    </div>
</div>
</div>
