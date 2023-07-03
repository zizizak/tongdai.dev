<h2>Khai báo tham số & danh bạ tổng đài</h2>
<div style="width:500px;float:left;">
    <div class="khaibao-group">
        <button>Khai báo TB</button>
        <button>Khai báo Class</button>
        <button>Khai báo hướng</button>
        <button>Khai báo số Quay</button>
    </div>
    <div class="ma-vung">
        <fieldset>
            <legend>Mã vùng</legend>
            <div class="row">
                <div class="element">Khai báo mã vùng</div>
                <div class="element"><input type="text" style="width:50px" /></div>
                <div class="element"><button>Nạp mã vùng</button></div>
            </div>
        </fieldset>
    </div>
    <div class="thoi-gian-cho">
        <fieldset>
            <legend>Thời gian chờ</legend>
            <div class="row">
                <div class="element">
                    Thời gian chờ T.Bao quay số
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="element">
                    Thời gian chờ giữa 2 số quay
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="element">
                    Thời gian chờ T.Bao nhấc máy/Thời gian cấp ring-back tối đa
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="element">
                    Thời gian chờ T.Bao gác máy/Thời gian cấp busy tone tối đa
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="element">
                    Thời gian chờ T.Bao bên ngoài quay số (Gọi trực tiếp vào tổng đài qua T.K CO-DID)
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="element">
                    Thời gian chờ phản hồi trên luồng sau khi quay số
                </div>
                <div class="element">
                    <select  class="form-select" disabled>
                        <option>15s</option>
                        <option>20s</option>
                    </select>
                </div>
            </div>
            <div class="row row-last">
                <input class="form-button" type="button" value="Cập nhật" disabled/>
            </div>
        </fieldset>
    </div>
</div>

<div style="width: 250px; float: left; margin-left: 10px;">
    <fieldset>
        <legend>Danh bạ</legend>
    <div class="tim-kiem-thong-so">
        <div class="row">
            <div class="element">
                <input type="text" style="width:70px" />
            </div>
            <div class="element">
                <button>Tìm SDB</button>
            </div>
        </div>
    </div>

    <div class="danh-sach-soDB">
        <div id="jqxgrid_DS_SoDB"></div>
    </div>
    <div class="row row-last">
        <input class="form-button" type="button" value="Thay đổi SDB"/>
    </div>
    </fieldset>
</div>

<div class="clear clearfix"></div>


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
        $("#jqxgrid_DS_SoDB").jqxGrid(
        {
            source: dataAdapter,
            columns: [
              { text: 'cards', datafield: 'cards', width: 50 },
              { text: 'STT T.bao', datafield: 'soTTTbao', width: 75 },
              { text: 'Số danh bạ', datafield: 'soDanhba', width: 100 },
            ]
        });
    });
</script>
