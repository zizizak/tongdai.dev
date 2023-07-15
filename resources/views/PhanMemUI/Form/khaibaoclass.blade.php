<div class="window-modal" id="modal-khaibaoclass">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Bảng Class</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-khaibaoclass"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:100%">
                <div class="row">
                    <div class="element">
                        ID Class
                    </div>
                    <div class="element">
                        <select  class="form-select" id="khaibaoClass_id_class" name="khaibaoClass_id_class">
                            <?php
                                $arTmp = array(
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                );
                            ?>
                            <?php foreach ($arTmp as $key => $value) {
                                echo sprintf('<option value="%s" >%s</option>', $key, $value);
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div style="width:300px;float:left;overflow:hidden;margin: 10px;">
                <div id='' style="font-size: 13px; font-family: Verdana; float: left;">
                    <div id="jqxgridClass"></div>
                </div>
            </div>

            <div style="width:400px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-KhaibaoClass">
                    <fieldset>
                        <legend><strong> Thêm mới thành phần (tối đa 20)</strong></legend>

                    <div class="row">
                        <div class="element">
                            Các Digits
                        </div>
                        <div class="element">
                            <input type="text" id="khaibaoClass_digits" name="khaibaoClass_digits" style="width:100px" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Quyền
                        </div>
                        <div class="element">
                            <select  class="form-select" name="khaibaoClass_quyen"  id="khaibaoClass_quyen">
                                <?php
                                    $arTmp = array(
                                        '0' => 'Cấm',
                                        '1' => 'Cho phép',
                                    );
                                ?>
                                <?php foreach ($arTmp as $key => $value) {
                                    echo sprintf('<option value="%s" >%s</option>', $key, $value);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" type="submit" value="Thêm"/>
                        <input type="hidden" name="khaibao_class_id_class_update" id="khaibao_class_id_class_update" value="1" />
                        <input type="hidden" name="task" value="UpdateKhaibaoClass" />
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>
            <div class="row row-last">
                <input type="hidden" value="0" id="khaibaoClass_xoa_id" />
                <input class="form-button form-button-clear" id="khaibaoClass_xoa" type="button" value="Xóa"/>
                <input class="form-button form-button-clear" id="khaibaoClass_xoa_toanbo" type="button" value="Xóa toàn bộ"/>
                <input class="form-button close-modal" data-id="modal-khaibaoclass" type="button" value="Thoát"/>
            </div>


        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var data = new Array();

            var ids = [
                "1","2","3","4","5"
            ];
            var Digits = [
                "","0","0","0","0"
            ];
            var Quyens = [
                "Được gọi","Được gọi","Được gọi","Được gọi","Không được"
            ];


            for (var i = 0; i < 5; i++) {
                var row = {};
                row["ids"] = ids[i];
                row["Digits"] = Digits[i];
                row["Quyens"] = Quyens[i];
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
            $("#jqxgridClass").jqxGrid(
            {
                source: dataAdapter,
                columns: [
                  { text: 'ID', datafield: 'ids', width: 100 },
                  { text: 'Digits', datafield: 'Digits', width: 100 },
                  { text: 'Quyền', datafield: 'Quyens', width: 100 },
                ]
            });


            $("#jqxgridClass").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#khaibaoClass_xoa_id").val(rowData.id);

                console.log(rowData);

            });




        });
    </script>
