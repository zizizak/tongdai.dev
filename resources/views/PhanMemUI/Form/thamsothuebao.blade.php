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
        <div style="width:320px;float:left;overflow:hidden;margin: 10px;">
            <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
                <div id="jqxgrid"></div>
            </div>
        </div>

        <div style="width:480px;float:left;margin-left:5px;">

            <form class="form-fix-width">
                <fieldset>
                    <legend>Thuê bao</legend>
                <div class="row">
                    <div class="element">
                        T.B đang chọn
                    </div>
                    <div class="element">
                        <strong>659100</strong>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Tự động/Từ thạch
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>Tự động</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Độ ưu tiên
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>Ưu tiên</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        ID Class
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền thiết lập hotline
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>Được quyền</option>
                            <option>Không được quyền</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền được nghe xen
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>Được quyền</option>
                            <option>Không được quyền</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Quyền thiết lập hội nghị
                    </div>
                    <div class="element">
                        <select  class="form-select">
                            <option>Được quyền</option>
                            <option>Không được quyền</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="element">
                        Mô tả
                    </div>
                    <div class="element">
                        <input type="text" style="width: 150px" />
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
            <input type="button" class="form-button close-modal" data-id="modal-thamsothuebao" value="Thoát"/>
        </div>


    </div>
</div>
</div>

<script type="text/javascript">
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
        $("#jqxgrid").jqxGrid(
        {
            source: dataAdapter,
            columns: [
              { text: 'cards', datafield: 'cards', width: 100 },
              { text: 'STT T.bao', datafield: 'soTTTbao', width: 100 },
              { text: 'Số danh bạ', datafield: 'soDanhba', width: 100 },
            ]
        });
    });
</script>
