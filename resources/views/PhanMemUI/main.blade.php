<div id="main-pm">
    <div class="window-control">
        <div class="fl-left">
            <p class="app-name">TOTEL64SIP - 192.168.0.17</p>
        </div>
        <div class="fl-right">
            <ul class="window-control-nav">
                <li><a href="#Minimum">_</a></li>
                <li><a href="#Maximum">#</a></li>
                <li><a href="#Close">X</a></li>
            </ul>
        </div>
        <div class="clear clearfix"></div>
    </div>

    <div class="window-content">
        <div class="main-links">
            <ul>
                <li><a href="#">Đã đăng nhập</a></li>
                <li><a href="#">Thoát đăng nhập</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">Thay đổi mật khẩu</a></li>
                <li><a href="#">Trợ giúp</a></li>
            </ul>
        </div>
        <div class="main-tab">
            <ul class="tab-nav">
                <li class="active"><a href="#" data-id="giaodien-tongdai" >Giao diện tổng đài</a></li>
                <li><a href="#" data-id="cauhing-thongso">Cấu hình thông số</a></li>
                <li><a href="#" data-id="quanly-cuoc">Quản lý cước</a></li>
            </ul>
            <div class="clear clearfix"></div>
            <div class="tab-content-wrap">
                <div class="tab-content active" id="giaodien-tongdai">
                    @include('PhanMemUI.CauhinhTongDai')
                </div>
                <div class="tab-content" id="cauhing-thongso">
                    @include('PhanMemUI.CauhinhThongso')
                </div>
                <div class="tab-content" id="quanly-cuoc" style="min-height: 500px;" >
                    @include('PhanMemUI.QuanlyCuoc')
                </div>
            </div>
            <div>
                <img src="/storage/images/main-bot.png" />
            </div>
        </div>
    </div>
</div>


@include('PhanMemUI.Form.cauhinhluongE1')
@include('PhanMemUI.Form.thamsothuebao')
@include('PhanMemUI.Form.thamsotrungke')
@include('PhanMemUI.Form.khaibaothuebao')
@include('PhanMemUI.Form.thaydoiSBD')
@include('PhanMemUI.Form.khaibaoclass')
@include('PhanMemUI.Form.khaibaohuong')
@include('PhanMemUI.Form.thanhphanhuong')
@include('PhanMemUI.Form.bangsoquay')

