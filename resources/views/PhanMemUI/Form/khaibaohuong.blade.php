<div class="window-modal" id="modal-khaibaohuong" style="left:25%;">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">CauhinhMahuong</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-khaibaohuong"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">


            <div style="width:480px;float:left;overflow:hidden;margin: 10px;">
                <fieldset style="padding:10px;">
                    <legend><strong> Hướng</strong></legend>
                    <div style="font-size: 13px; font-family: Verdana; float: left;">
                        <div id="jqxgridHuong"></div>
                    </div>
                    <form class="form-fix-width">
                        <fieldset>
                            <legend><strong> Thêm xóa mã hướng</strong></legend>
                            <div class="row">
                                <div class="element">
                                    ID Mã hướng
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Mã hướng
                                </div>
                                <div class="element">
                                    <input type="text" style="width:100px" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Số chặn
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Số phải quay tối thiểu để bắt đầu quay số
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Hướng của mã hướng
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row row-last">
                                <input class="form-button form-button-clear form-button-left" type="button" value="Xóa"/>
                                <input class="form-button" type="button" value="Thêm"/>
                            </div>
                        </fieldset>
                    </form>
                </fieldset>
            </div>

            <div style="width:320px;float:left;margin-left:5px;">
                <fieldset style="padding:10px;">
                    <legend ><strong> Mã hướng</strong></legend>

                    <div style="font-size: 13px; font-family: Verdana; float: left;">
                        <div id="jqxgridMaHuong"></div>
                    </div>

                    <form class="form-fix-width">
                        <fieldset>
                            <legend><strong> Thêm xóa hướng</strong></legend>
                            <div class="row">
                                <div class="element">
                                    ID Hướng
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Loại
                                </div>
                                <div class="element">
                                    <select  class="form-select">
                                        <option>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row row-last">
                                <input class="form-button open-modal" data-id="modal-thanhphanhuong" type="button" value="Thành phần"/>
                            </div>
                            <div class="row row-last">
                                <input class="form-button form-button-clear form-button-left" type="button" value="Xóa"/>
                                <input class="form-button" type="button" value="Thêm"/>
                            </div>
                        </fieldset>
                    </form>
                </fieldset>
            </div>
            <div class="clear clearfix"></div>
            <div class="row row-last">
                <input class="form-button close-modal" data-id="modal-khaibaohuong" type="button" value="Thoát"/>
            </div>


        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var data = new Array();

            var ids = [
                "1","2"
            ];
            var maHuongs = [
                "0","200"
            ];
            var SoChans = [
                "1","3"
            ];
            var SoQuayT = [
                "3","3"
            ];
            var Huong = [
                "1","2"
            ];


            for (var i = 0; i < 2; i++) {
                var row = {};
                row["ids"] = ids[i];
                row["maHuongs"] = maHuongs[i];
                row["SoChans"] = SoChans[i];
                row["SoQuayT"] = SoQuayT[i];
                row["Huong"] = Huong[i];
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

            $("#jqxgridHuong").jqxGrid(
            {
                source: dataAdapter,
                width: 450,
                height:200,
                columns: [
                  { text: 'ID', datafield: 'ids', width: 50 },
                  { text: 'maHuong', datafield: 'maHuongs', width: 70 },
                  { text: 'SoChan', datafield: 'SoChans', width: 70 },
                  { text: 'SoQuayT', datafield: 'SoQuayT', width: 70 },
                  { text: 'Huong', datafield: 'Huong', width: 70 },
                ]
            });



            var ids = [
                "0","1","2","3","4"
            ];
            var Loai = [
                "Luồng E1","T.Kế CO","T.Kế DKX","T.Kế ĐKX","T.Kế CO"
            ];
            var Thanhphan = [
                "1","1","5","6","2,3,4"
            ];


            var data2 = new Array();
            for (var i = 0; i < 5; i++) {
                var row = {};
                row["ids"] = ids[i];
                row["Loai"] = Loai[i];
                row["Thanhphan"] = Thanhphan[i];
                data2[i] = row;
            }

            var source2 =
            {
                localdata: data2,
                datatype: "array"
            };
            var dataAdapter2 = new $.jqx.dataAdapter(source2, {
                loadComplete: function (data2) { },
                loadError: function (xhr, status, error) { }
            });

            $("#jqxgridMaHuong").jqxGrid(
            {
                source: dataAdapter2,
                width: 300,
                height:310,
                columns: [
                  { text: 'ID', datafield: 'ids', width: 100 },
                  { text: 'Loai', datafield: 'Loai', width: 100 },
                  { text: 'Thanhphan', datafield: 'Thanhphan', width: 100 },
                ]
            });
        });
    </script>
