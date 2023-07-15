<div class="window-modal" id="modal-khaibaothuebao" style="width:500px;left:35%;">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Khai báo thuê bao</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class=" close-modal" data-id="modal-khaibaothuebao"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:480px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-Khaibaothuebao">
                    <fieldset>
                        <legend>Cấu hình thuê bao</legend>
                    <div class="row">
                        <div class="element">
                            Số prefix
                        </div>
                        <div class="element">
                            <input type="text" style="width:70px" name="prefix" id="prefix" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Số danh bạ bắt đầu
                        </div>
                        <div class="element">
                            <select  class="form-select" name="sobatdau" id="sobatdau">
                                <?php
                                    $arTmp = array(
                                        '100' => '100',
                                        '200' => '200',
                                        '300' => '300',
                                        '400' => '400',
                                        '500' => '500',
                                        '600' => '600',
                                        '700' => '700',
                                        '800' => '800',
                                        '900' => '900',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" data-id="modal-khaibaothuebao" type="submit" value="Thay đổi"/>
                        <input type="hidden" name="task" value="UpdateKhaibaoThuebao" />
                        <input type="hidden" name="khaibaothuebao_id" id="khaibaothuebao_id" value="0" />
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>

        </div>
    </div>
    </div>

