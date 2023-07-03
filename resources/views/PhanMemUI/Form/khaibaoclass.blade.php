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
                        <select  class="form-select">
                            <option>1</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
            </div>
            <div style="width:320px;float:left;overflow:hidden;margin: 10px;">
                <div id='' style="font-size: 13px; font-family: Verdana; float: left;">
                    <div id="jqxgridClass"></div>
                </div>
            </div>

            <div style="width:480px;float:left;margin-left:5px;">

                <form class="form-fix-width">
                    <fieldset>
                        <legend><strong> Thêm mới thành phần (tối đa 20)</strong></legend>

                    <div class="row">
                        <div class="element">
                            Các Digits
                        </div>
                        <div class="element">
                            <input type="text" style="width:100px" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Quyền
                        </div>
                        <div class="element">
                            <select  class="form-select">
                                <option></option>
                                <option>Được gọi</option>
                                <option>Không được</option>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" type="button" value="Thêm"/>
                    </div>
                </fieldset>
                </form>
            </div>
            <div class="clear clearfix"></div>
            <div class="row row-last">
                <input class="form-button form-button-clear" type="button" value="Xóa"/>
                <input class="form-button form-button-clear" type="button" value="Xóa toàn bộ"/>
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
        });
    </script>
