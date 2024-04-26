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


            <div style="width:440px;float:left;overflow:hidden;margin: 0 10px;">
                <fieldset style="padding:10px;">
                    <legend><strong> Mã Hướng</strong></legend>
                    <div style="font-size: 13px; font-family: Verdana; float: left;">
                        <div id="jqxgridMaHuong"></div>
                    </div>
                    <form class="form-fix-width" id="form-mahuong">
                        <fieldset>
                            <legend><strong> Thêm xóa mã hướng</strong></legend>
                            <div class="row">
                                <div class="element">
                                    ID Mã hướng
                                </div>
                                <div class="element">
                                    <select  class="form-select" id="Mahuong_mahuong_id" name="Mahuong_mahuong_id">
                                        <?php for ($i = 0; $i <= 255; $i++) {
                                            echo sprintf('<option value="%s" >%s</option>', $i, $i);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Mã hướng
                                </div>
                                <div class="element">
                                    <input type="text" style="width:100px" id="Mahuong_huong_dinhtuyen" name="Mahuong_huong_dinhtuyen" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Số chặn
                                </div>
                                <div class="element">
                                    <select  class="form-select" name="Mahuong_sochan" id="Mahuong_sochan" >
                                        <?php for ($i = 0; $i <= 9; $i++) {
                                            echo sprintf('<option value="%s" >%s</option>', $i, $i);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Số phải quay tối thiểu để bắt đầu quay số
                                </div>
                                <div class="element">
                                    <select  class="form-select" name="Mahuong_min_soquay" id="Mahuong_min_soquay">
                                        <?php for ($i = 0; $i <= 9; $i++) {
                                            echo sprintf('<option value="%s" >%s</option>', $i, $i);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Hướng của mã hướng
                                </div>
                                <div class="element">
                                    <select  class="form-select" name="Mahuong_huong" id="Mahuong_huong">

                                    </select>
                                </div>
                            </div>
                            <div class="row row-last">
                                <input class="form-button form-button-clear form-button-left" type="button" id="Mahuong_xoa" value="Xóa"/>
                                <input class="form-button" type="submit" value="Thêm"/>
                                <input type="hidden" id="Mahuong_xoa_id" />
                                <input type="hidden" name="task" value="UpdateMaHuong" />
                            </div>
                        </fieldset>
                    </form>
                </fieldset>
            </div>

            <div style="width:320px;float:left;margin:0 10px;">
                <fieldset style="padding:10px;">
                    <legend ><strong> Hướng</strong></legend>

                    <div style="font-size: 13px; font-family: Verdana; float: left;">
                        <div id="jqxgridHuong"></div>
                    </div>

                    <form class="form-fix-width" id="form-Khaibaohuong">
                        <fieldset>
                            <legend><strong> Thêm xóa hướng</strong></legend>
                            <div class="row">
                                <div class="element">
                                    ID Hướng
                                </div>
                                <div class="element" >
                                    <select  class="form-select" id="khaibaoHuong_id_huong" name="khaibaoHuong_id_huong">
                                        <?php for ($i = 0; $i <= 20; $i++) {
                                            echo sprintf('<option value="%s" >%s</option>', $i, $i);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="element">
                                    Loại
                                </div>
                                <div class="element">
                                    <select  class="form-select" id="khaibaoHuong_loai" name="khaibaoHuong_loai">
                                        <?php 
                                        $ar_loai_huong = array(
                                            '1' => '1-CO',
                                            '2' => '2-E1',
                                            '3' => '3-ĐKX',
                                            '4' => '4-IP',
                                        );
                                        foreach($ar_loai_huong as $key=>$item) {
                                            echo sprintf('<option value="%s" >%s</option>', $key, $item);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row row-last">
                                <input class="form-button open-modal" data-id="modal-thanhphanhuong" type="button" value="Thành phần"/>
                            </div>
                            <div class="row row-last">

                                <input type="hidden" name="khaibaoHHuong_loai_thanhphan" id="khaibaoHHuong_loai_thanhphan" />
                                <input type="hidden" name="khaibaoHHuong_thanhphan" id="khaibaoHHuong_thanhphan" />
                                <input class="form-button form-button-clear form-button-left"  id="khaibaoHuong_xoa" type="button" value="Xóa"/>
                                <input class="form-button" type="submit" value="Thêm"/>
                                <input type="hidden" name="khaibaoHuong_xoa_id" id="khaibaoHuong_xoa_id" value="0" />
                                <input type="hidden" name="task" value="UpdateHuong" />
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

            $("#jqxgridMaHuong").jqxGrid(
            {
                source: dataAdapter,
                width: 400,
                height:250,
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

            $("#jqxgridHuong").jqxGrid(
            {
                source: dataAdapter2,
                width: 300,
                height:250,
                columns: [
                  { text: 'ID', datafield: 'ids', width: 100 },
                  { text: 'Loai', datafield: 'Loai', width: 100 },
                  { text: 'Thanhphan', datafield: 'Thanhphan', width: 100 },
                ]
            });


            $("#jqxgridHuong").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#khaibaoHuong_id_huong").val(rowData.huong_id);
                $("#khaibaoHuong_loai").val(rowData.loai);
                $("#khaibaoHHuong_thanhphan").val(rowData.thanhphan);
                $("#khaibaoHuong_xoa_id").val(rowData.id);
                $("#thanhphan_huong_id").val(rowData.huong_id);

                

                var loai_thanhphan = rowData.loai_thanhphan;

                $(".loai_thanhphan_huong").prop( "checked", false );
                $(".loai_thanhphan_text").val("");

                if(loai_thanhphan == 1) { //E1
                    $("#thanhphan_E1" ).prop( "checked", true );
                    $("#thanhphan_E1_giatri").val(rowData.thanhphan);
                    $("#thanhphan_E1_giatri").prop('disabled', false);
                    $("#thanhphan_dkx_giatri").prop('disabled', true);
                }else {
                    $("#thanhphan_dkx" ).prop( "checked", true );
                    $("#thanhphan_dkx_giatri").val(rowData.thanhphan);
                    $("#thanhphan_dkx_giatri").prop('disabled', false);
                    $("#thanhphan_E1_giatri").prop('disabled', true);
                }
                console.log(rowData);
            });


            $(".loai_thanhphan_huong").click(function(){
                var idx = $(this).attr('id');
                console.log(idx);

                if(idx == "thanhphan_E1") {
                    $("#thanhphan_dkx" ).prop( "checked", false );
                    $("#thanhphan_E1_giatri").prop('disabled', false);
                    $("#thanhphan_dkx_giatri").prop('disabled', true);
                }else {
                    $("#thanhphan_E1" ).prop( "checked", false );
                    $("#thanhphan_dkx_giatri").prop('disabled', false);
                    $("#thanhphan_E1_giatri").prop('disabled', true);
                }




            })













            $("#jqxgridMaHuong").on('rowselect', function (event) {
                //$("#selectrowindex").text(event.args.rowindex);
                var args = event.args;
                var rowData = args.row;

                $("#Mahuong_mahuong_id").val(rowData.mahuong_id);
                $("#Mahuong_huong_dinhtuyen").val(rowData.mahuong_dinhtuyen);
                $("#Mahuong_sochan").val(rowData.sochan);
                $("#Mahuong_min_soquay").val(rowData.min_soquay);
                $("#Mahuong_huong").val(rowData.huong_id);
                $("#Mahuong_xoa_id").val(rowData.id);

                console.log(rowData);
            });













        });
    </script>
