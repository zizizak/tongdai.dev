<div class="window-modal" id="modal-thamsotrungke">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Tham số trung kế</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-thamsotrungke"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:320px;float:left;overflow:hidden;margin: 10px;">
                <div id='jqxgridTrungke' style="font-size: 13px; font-family: Verdana; float: left;">
                    <div id="jqxgrid"></div>
                </div>
            </div>

            <div style="width:480px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-thamsotrungkeCO">
                    <fieldset>
                        <legend>Thuê bao</legend>
                    <div class="row">
                        <div class="element">
                            T.Kế đang chọn
                        </div>
                        <div class="element">
                            <strong id="tke_dangchon_text">1</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Trung kế điều khiển từ xa
                        </div>
                        <div class="element">
                            <input type="checkbox" name="tke_dieukhienxa" id="tke_dieukhienxa" value="1" /> Có
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Loại TK
                        </div>
                        <div class="element">
                            <select  class="form-select" name="loai_tk" id="loai_tk" >
                                <?php
                                    $arTmp = array(
                                        '0' => 'Chỉ gọi vào',
                                        '1' => 'Gọi vào/ra',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Mở khóa
                        </div>
                        <div class="element">
                            <select  class="form-select" name="mo_khoa" id="mo_khoa">
                                <?php
                                    $arTmp = array(
                                        '0' => 'Khóa',
                                        '1' => 'Mở',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Tính cước
                        </div>
                        <div class="element">
                            <select  class="form-select" name="tinhcuoc" id="tinhcuoc">
                                <?php
                                    $arTmp = array(
                                        '0' => 'Thời gian',
                                        '1' => 'Đảo cực',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Kiểu gọi vào
                        </div>
                        <div class="element">
                            <select  class="form-select" name="kieugoivao" id="kieugoivao">
                                <?php
                                    $arTmp = array(
                                        '0' => 'DISA',
                                        '1' => 'PO',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" type="submit" value="Cập nhật"/>
                        <input type="hidden" name="task" value="UpdateThamsotrungkeCO" />
                        <input type="hidden" name="thamsotrungke_id" id="thamsotrungke_id" value="" />
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>
            <div class="row row-last">
                <input type="button" class="form-button close-modal" data-id="modal-thamsotrungke" value="Thoát"/>
            </div>


        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var data = new Array();

            var cards = [
                "10","10","10","10","10"
            ];
            var soTTTKe = [
                "1","2","3","4","5"
            ];


            for (var i = 0; i < 5; i++) {
                var row = {};
                row["cards"] = cards[i];
                row["soTTTKe"] = soTTTKe[i];
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
            $("#jqxgridTrungke").jqxGrid(
            {
                width: 300,
                source: dataAdapter,
                columns: [
                  { text: 'cards', datafield: 'cards', width: 100 },
                  { text: 'STT T.Kế', datafield: 'soTTTKe', width: 100 },
                ]
            });


            $("#jqxgridTrungke").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#thamsotrungke_id").val(rowData.id);
                $("#tke_dangchon_text").html(rowData.id_stt);
                $("#loai_tk").val(rowData.loai);
                $("#mo_khoa").val(rowData.mo_khoa);
                $("#tinhcuoc").val(rowData.tinhcuoc);
                $("#kieugoivao").val(rowData.kieu_goivao);

                if(rowData.dieukhienxa == 1) {
                    $("#tke_dieukhienxa").prop( "checked", true );
                }else {
                    $("#tke_dieukhienxa").prop( "checked", false );
                }

                console.log(rowData);

            });





        });
    </script>
