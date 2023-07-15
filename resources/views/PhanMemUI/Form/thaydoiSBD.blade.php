<div class="window-modal" id="modal-thaydoiSDB" style="left:35%;">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Thay đổi SDB</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-thaydoiSDB"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:480px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-thaydoiSDB">
                    <fieldset>
                        <legend>Cấu hình thuê bao</legend>
                        <div class="row">
                            <div class="element">
                                Số DB cũ
                            </div>
                            <div class="element">
                                <strong id="thaydoiSDB_sohientai" >...</strong>
                            </div>
                        </div>
                        <div class="row">
                        <div class="element">
                            Số DB mới
                        </div>
                        <div class="element">
                            <input type="text" style="width:70px"  id="thaydoiSDB_somoi" name="thaydoiSDB_somoi"  required />
                        </div>
                    </div>
                    <div class="row row-last">
                        <input type="hidden" name="thaydoiSDB_id" id="thaydoiSDB_id" />
                        <input class="form-button" data-id="modal-thaydoiSDB" type="submit" value="Thay đổi"/>
                        <input type="hidden" name="task" value="UpdateSoDanhba" />
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>

        </div>
    </div>
    </div>

