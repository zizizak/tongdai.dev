<div class="window-modal" id="modal-bangsoquay" style="left: 35%;">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Bảng số quay</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-bangsoquay"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:300px;float:left;overflow:hidden;margin: 0 10px 10px;">
                <div>
                    <div id="jqxgridBangsoquay"></div>
                </div>
            </div>

            <div style="width:338px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-bangsoquay">
                    <fieldset>
                        <legend>Thêm mới đầu số (tối đa 20)</legend>

                    <div class="row">
                        <div class="element">
                            Đầu số
                        </div>
                        <div class="element">
                            <input type="text" name="bangsoquay_dauso" id="bangsoquay_dauso" style="width:100px" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Số digit
                        </div>
                        <div class="element">
                            <select  class="form-select" name="bangsoquay_digit" id="bangsoquay_digit">
                                <?php for ($i = 3; $i <= 16; $i++) {
                                    echo sprintf('<option value="%s" >%s</option>', $i, $i);
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" type="submit" value="Thêm"/>
                        <input type="hidden" name="task" value="UpdateBangsoquay">
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>
            <div class="row row-last">
                <input class="form-button form-button-clear form-button-left" id="bangsoquay_xoa" type="button" value="Xóa">
                <input type="hidden" name="bangsoquay_xoa_id" id="bangsoquay_xoa_id" value="0">
                <input class="form-button close-modal" data-id="modal-bangsoquay" type="button" value="Thoát"/>

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
            var dausos = [
                "10","10","10","10","10"
            ];
            var soDigits = [
                "1","2","3","4","5"
            ];


            for (var i = 0; i < 5; i++) {
                var row = {};
                row["ids"] = ids[i];
                row["dausos"] = dausos[i];
                row["soDigits"] = soDigits[i];
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
            $("#jqxgridBangsoquay").jqxGrid(
            {
                source: dataAdapter,
                columns: [
                  { text: 'ID', datafield: 'ids', width: 100 },
                  { text: 'Đầu số', datafield: 'dausos', width: 100 },
                  { text: 'Số Digit', datafield: 'soDigits', width: 100 },
                ]
            });


            $("#jqxgridBangsoquay").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#bangsoquay_dauso").val(rowData.dauso);
                $("#bangsoquay_digit").val(rowData.so_digits);
                $("#bangsoquay_xoa_id").val(rowData.id);

                console.log(rowData);
            });


        });
    </script>
