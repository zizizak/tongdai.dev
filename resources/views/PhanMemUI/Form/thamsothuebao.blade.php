<div class="window-modal" id="modal-thamsothuebao">
<div class="window-control">
    <div class="fl-left">
        <p class="app-name">Tham số thuê bao</p>
    </div>
    <div class="fl-right">
        <ul class="window-control-nav">
            <li><a href="#Minimum">_</a></li>
            <li><a href="#Maximum">#</a></li>
            <li class="close-modal" data-id="modal-thamsothuebao"><a href="#Close">X</a></li>
        </ul>
    </div>
    <div class="clear clearfix"></div>
</div>
<div class="window-content">
    <div class="window-content-detail">
        <div style="width:300px;float:left;overflow:hidden;margin: 10px;">
            <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
                <div id="jqxgridThuebao"></div>
            </div>
        </div>

        <div style="width:460px;float:left;margin-left:5px;">

            <form class="form-fix-width" id="form-thamsothuebao">
                <fieldset>
                    <legend>Thuê bao</legend>
                <div class="row">
                    <div class="element">
                        T.B đang chọn
                    </div>
                    <div class="element">
                        <strong id="tb_dangchon_text">659100</strong>
                        <input type="hidden" name="tb_dang_chon" id="tb_dang_chon" value="" />
                        <input type="hidden" name="tstb_id" id="tstb_id" value="" />
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Tự động/Từ thạch
                    </div>
                    <div class="element">
                        <?php
                            $arTSTB_tudong_tuthach = array(
                                '0' => 'Tự động',
                                '1' => 'Từ thạch',
                            );
                        ?>
                        <select  class="form-select" id="tudong_tuthach" name="tudong_tuthach">
                            <?php foreach ($arTSTB_tudong_tuthach as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Độ ưu tiên
                    </div>
                    <div class="element">
                        <select  class="form-select" id="do_uu_tien" name="do_uu_tien">
                            <?php
                                $arTSTB_uutien = array(
                                    '0' => '0',
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                    '8' => '8',
                                    '9' => '9',
                                );
                            ?>
                            <?php foreach ($arTSTB_uutien as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        ID Class
                    </div>
                    <div class="element">
                        <select  class="form-select" id="class_id" name="class_id">
                            <?php
                                $arTSTB_idClass = array(
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                );
                            ?>
                            <?php foreach ($arTSTB_idClass as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền thiết lập hotline
                    </div>
                    <div class="element">
                        <select  class="form-select" id="quyen_thiet_lap" name="quyen_thiet_lap">
                            <?php
                                $arTSTB_QuyenThietLap = array(
                                    '0' => '0',
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                );
                            ?>
                            <?php foreach ($arTSTB_QuyenThietLap as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền được nghe xen
                    </div>
                    <div class="element">
                        <select  class="form-select" name="quyen_nghe_xen" id="quyen_nghe_xen">
                            <?php
                                $arTSTB_QuyenNgheXen = array(
                                    '0' => '0',
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                );
                            ?>
                            <?php foreach ($arTSTB_QuyenNgheXen as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền thiết lập hội nghị
                    </div>
                    <div class="element">
                        <select  class="form-select" id="quyen_thietlap_hoinghi"  name="quyen_thietlap_hoinghi">
                            <?php
                                $arTSTB_QuyenThietLapHoiNghi = array(
                                    '0' => '0',
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                    '6' => '6',
                                    '7' => '7',
                                );
                            ?>
                            <?php foreach ($arTSTB_QuyenThietLapHoiNghi as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Mô tả
                    </div>
                    <div class="element">
                        <input type="text" style="width: 150px" name="mota" id="mota" />
                    </div>
                </div>
                <div class="row row-last">
                    <input class="form-button" type="submit" value="Cập nhật"/>
                    <input type="hidden" name="task" value="UpdateThamsothuebao" />
                    <input type="hidden" name="card" id="card" value="" />
                </div>
            </fieldset>
            </form>
        </div>
        <div class="clear clearfix"></div>
        <div class="row row-last">
            <input type="button" class="form-button close-modal" data-id="modal-thamsothuebao" value="Thoát"/>
        </div>


    </div>
</div>
</div>

<script type="text/javascript">
    var prefix = "659";
    $(document).ready(function () {
        // prepare the data
        var data = new Array();

        var cards = [
            "1","1","1","1","1"
        ];
        var soTTTbao = [
            "1","2","3","4","5"
        ];
        var soDanhba = [
            "659100","659101","659102","659103","659104"
        ];

        for (var i = 0; i < 5; i++) {
            var row = {};
            row["cards"] = cards[i];
            row["soTTTbao"] = soTTTbao[i];
            row["soDanhba"] = soDanhba[i];
            data[i] = row;
        }

        var source =
        {
            localdata: data,
            datatype: "array"
        };
        var dataAdapter = new $.jqx.dataAdapter(source, {
            loadComplete: function (data) { },
            loadError: function (xhr, status, error) { }
        });
        $("#jqxgridThuebao").jqxGrid(
        {
            width:300,
            source: dataAdapter,
            columns: [
              { text: 'cards', datafield: 'cards', width: 100 },
              { text: 'STT T.bao', datafield: 'soTTTbao', width: 100 },
              { text: 'Số danh bạ', datafield: 'soDanhba', width: 100 },
            ]
        });


        $("#jqxgridThuebao").on('rowselect', function (event) {
            //$("#selectrowindex").text(event.args.rowindex);
            var args = event.args;
            var rowData = args.row;



            $("#tb_dangchon_text").html(prefix + rowData.socuoi);
            $("#tstb_id").val(rowData.id);
            $("#tudong_tuthach").val(rowData.loai);
            $("#do_uu_tien").val(rowData.uutien);
            $("#class_id").val(rowData.class_id);
            $("#quyen_thiet_lap").val(rowData.quyen);
            $("#quyen_nghe_xen").val(rowData.quyen);
            $("#quyen_thietlap_hoinghi").val(rowData.quyen);
            $("#card").val(rowData.card);
            $("#mota").val(rowData.mota);


            console.log(rowData);

        });




    });
</script>
