<div class="tong-dai-top">
    <form method="get">
        <div>
            <span style="color: red;">Cấu hình hiện thời: <?php echo $cauhinh_active ?></span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span style="margin-left:100px;">
                <select name="cauhinh_active">
                    <option value="0" <?php echo ($cauhinh_active == 0) ? 'selected="selected"' : ''; ?> >0</option>
                    <option value="1" <?php echo ($cauhinh_active == 1) ? 'selected="selected"' : ''; ?> >1</option>
                    <option value="2" <?php echo ($cauhinh_active == 2) ? 'selected="selected"' : ''; ?> >2</option>
                </select>
            </span>
            <span>
                <input  type="radio" name="cauhinh_type" checked="checked" value="kichhoat"/> Kích hoạt
                <input  type="radio" name="cauhinh_type" value="luu" /> Lưu
            </span>
            <span>
                <input type="submit" value="OK" />
            </span>
            &nbsp;
            <span style="color: red;margin-left:100px;">TBao: 64 TKế: 8 luồng E1: 4 luồng</span>
        </div>
    </form>
</div>
<div class="left-panel">
    <fieldset>
        <div class="block-info-wrap">
            <div class="block-info">
                <fieldset>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item empty-border"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item empty-border"></div>
                    <div class="block-item blank"></div>
                    <div class="block-title">CPU</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green open-modal" data-id="modal-cauhinhluongE1" ></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item blank"></div>
                    <div class="block-item purble-small"></div>
                    <div class="block-item purble-small"></div>
                    <div class="block-title">E1</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="1"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=1&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 1</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="2"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=2&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 2</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="3"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=3&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 3</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="4"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=4&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 4</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="5"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=5&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 5</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="6"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=6&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 6</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="7"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=7&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 7</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsothuebao" data-card-id="8"></div>
                    <?php
                    for($i=1;$i<=8;$i++) {
                        $ajax_link = "http://tongdai.dev.test:8090/publicajax?task=getQuickInfo&card_id=8&stt_id=" . $i;
                        ?>
                        <div class="block-item green thuebao" >
                            <a href="<?php echo $ajax_link ?>" class="ajax_link"><?php echo $i; ?></a>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="block-title">Sub 8</div>
                </fieldset>
            </div>
            <div class="block-info">
                <fieldset>
                    <div class="block-item green large open-modal" data-id="modal-thamsotrungke"></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-item green "></div>
                    <div class="block-title">EXT</div>
                </fieldset>
            </div>
            <div class="clear clearfix"></div>
        </div>
    </fieldset>
</div>
<div class="right-panel">
    <fieldset>
        <br>
        <img src="/storage/images/tong-dai-right.png" style="width:100%;    height: 236px;" />
    </fieldset>
</div>
<div class="clear"></div>
<div class="may-truc">
        <img src="/storage/images/may-truc.png" style="width:100%;" />
</div>


<!-- Khong xoa - Template hien thi Tippy -->
  <div  id="template" style="display: none;">
        <div class="d2-tt">
        </div>
  </div>




<script>
    /*
tippy('.thuebao', {
  content: '------  Thông số thuê bao ------ <br/> IdThuebao: 1 <br/> IdCard: 2  <br/> Số danh bạ: 659108 <br/> Loại: Tự động <br/> Độ ưu tiên: Không ưu tiên  <br/> Id Class: 4 <br/> Quyền thiết lập hotline: Được phép <br/> Quyền nghe xen: Được phép <br/> Quyền thiết lập hội nghị: Được phép  <br/><br/> ------ Mô tả thuê bao ------  <br/>Mô tả: Tốt  <br/>',
  allowHTML: true,
  //trigger: 'click',
});
*/

tippy('[data-tippy-content]', {
    allowHTML: true,
});

jQuery(document).ready(function($){




    $('body').on('mouseenter', '.thuebao', function(e) {

        var link = $(this).find('.ajax_link').attr('href');

        $.ajax({
            url: link
        })
        .done(function( data ) {
            $('.d2-tt').html(data.data);
        });

        return false;

    });




})


const template = document.getElementById('template');

    tippy('.thuebao', {
      content: template.innerHTML,
      allowHTML: true,
      //followCursor: true,
      duration: 200,
      //offset: [0, 10],
      //placement: 'auto',
      //placement: 'auto-start',
      //placement: 'auto-end',
      touch: 'hold'
    });



</script>



