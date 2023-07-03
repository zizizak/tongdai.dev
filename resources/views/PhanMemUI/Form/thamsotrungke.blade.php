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

                <form class="form-fix-width">
                    <fieldset>
                        <legend>Thuê bao</legend>
                    <div class="row">
                        <div class="element">
                            T.Kế đang chọn
                        </div>
                        <div class="element">
                            <strong>1</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Trung kế điều khiển từ xa
                        </div>
                        <div class="element">
                            <input type="checkbox" /> Có
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Loại TK
                        </div>
                        <div class="element">
                            <select  class="form-select">
                                <option>Gọi vào & gọi ra</option>
                                <option>....</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Mở khóa
                        </div>
                        <div class="element">
                            <select  class="form-select">
                                <option>Mở</option>
                                <option>....</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Tính cước
                        </div>
                        <div class="element">
                            <select  class="form-select">
                                <option>Quy định thời gian</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="element">
                            Kiểu gọi vào
                        </div>
                        <div class="element">
                            <select  class="form-select">
                                <option>Qua PO</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row row-last">
                        <input class="form-button" type="button" value="Cập nhật"/>
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
                source: dataAdapter,
                columns: [
                  { text: 'cards', datafield: 'cards', width: 100 },
                  { text: 'STT T.Kế', datafield: 'soTTTKe', width: 100 },
                ]
            });
        });
    </script>
