<div class="window-modal" id="modal-thanhphanhuong" style="left:35%;top:90px;">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">Thành phần hướng</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li class="close-modal" data-id="modal-thanhphanhuong"><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>
    <div class="window-content">
        <div class="window-content-detail">
            <div style="width:480px;float:left;margin-left:5px;">

                <form class="form-fix-width" id="form-thanhphan-huong">
                        <h3>Chọn thành phần thuộc hướng</h3>
                        <p>(Gõ thành phần, ngăn cách nhau bằng dấu phẩy , hoặc dấu "-") <br> Ví dụ: (1,2,3 hay 1-3)</p>
                        <div class="row">
                            <div class="element">
                                <input type="checkbox" class="loai_thanhphan_huong" name="thanhphan_dkx" id="thanhphan_dkx" />Trung kế (Trung kế DKX)
                            </div>
                            <div class="element">
                                <input type="checkbox" class="loai_thanhphan_huong" name="thanhphan_E1" id="thanhphan_E1" />Luồng E1
                            </div>
                        </div>
                        <div class="row">
                        <div class="element">
                            <input type="text" style="width:100px" class="loai_thanhphan_text" name="thanhphan_dkx_giatri" id="thanhphan_dkx_giatri" />
                        </div>
                        <div class="element">
                            <input type="text" style="width:100px" class="loai_thanhphan_text" name="thanhphan_E1_giatri"  id="thanhphan_E1_giatri"  />
                        </div>
                    </div>                   
                    <div class="row row-last">
                        <input class="form-button" type="submit" value="Cập nhật"/>
                        <input type="hidden" name="task" value="UpdateThanhphanHuong" />
                        <input type="hidden" name="thanhphan_huong_id" id="thanhphan_huong_id" value="" />
                    </div>
                </form>
            </div>
            <div class="clear clearfix"></div>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($){
        $("#form-thanhphan-huong").submit(function(){
            //console.log(111);
            //return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var modal_id = 'modal-thanhphanhuong';
            $.ajax({
                type: 'post',
                url: '/admin/ajax',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    loadHuong_tmp(1);
                    $("#" + modal_id).hide();                    
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        })

        function loadHuong_tmp(resetForm){
            if(resetForm == 1) {
                //$("#thamsotrungke_id").val(0);
                //$("#tke_dangchon_text").html("Chưa chọn trung kế");
            }

            url = "/publicajax/?task=getHuong";
            var source =
            {
                datatype: "json",
                url: url
            };
            var newAdapter = new $.jqx.dataAdapter(source, {
                downloadComplete: function (data, status, xhr) { },
                loadComplete: function (data) { },
                loadError: function (xhr, status, error) { }
            });

            $("#jqxgridHuong").jqxGrid(
                {
                    source: newAdapter,
                    columns: [
                        { text: 'ID', datafield: 'huong_id', width: 100 },
                        { text: 'Loai', datafield: 'loai', width: 100 },
                        { text: 'Thanhphan', datafield: 'thanhphan', width: 100 },
                    ]
                });

            bindMahuong_huong_tmp();
        }

        function bindMahuong_huong_tmp(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                type: 'post',
                url: '/publicajax/?task=getHuong',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (data) {
                    console.log('bindMahuong_huong');
                    console.log(data);
                    var rowData = data.data;
                    var str_options = '';
                    for (let i = 0; i < rowData.length; i++) {
                        str_options += '<option value="' + rowData[i].huong_id + '">' + rowData[i].huong_id + '</option>';
                    }
                    $("#Mahuong_huong").html(str_options);

                },
                error: function (data) {
                    console.log(data);
                }
            });

        }


    })
</script>