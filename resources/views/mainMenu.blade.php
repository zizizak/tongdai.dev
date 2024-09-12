
<div class="container menu-main">
    <div class="banner">
        <img src="/storage/images/banner.jpg" class="img" />
    </div>
    <div class="tutorial">
        <ul class="menu">
            <li><a href="/">TRANG CHỦ</a></li>
            <li><a href="/admin/thongsokythuat">TÍNH NĂNG KỸ CHẾN THUẬT</a></li>
            {{-- <li><a href="/admin/sodokhoi">Sơ đồ khối và chức năng</a></li> --}}
            <li><a href="#">ĐẶC ĐIỂM KẾT CẤU</a>
                <ul>
                    <li><a href="/admin/cautruc">CẤU TRÚC CHUNG</a></li>
                    <!-- <li><a href="/admin/cacloaicard">Chức năng các Card</a></li> -->
                    <li><a href="/admin/sodokhoi">SƠ ĐỒ KHỐI VÀ CHỨC NĂNG</a></li>

                </ul>
            </li>


            <!--
        <li>Tính năng và thông số kỹ thuật <i class="fa fa-angle-down"></i>
        <ul>
            <li><a href="/admin/thongsokythuat">Giới thiệu chung</a></li>
            <li><a href="/admin/thongsokythuat">Các tính năng kỹ chiến thuật</a>  </li>
            <li><a href="/admin/thongsokythuat">Thông số kỹ thuật</a> </li>
        </ul>
        </li>

        <li>Sơ đồ khối và chức năng các khối <i class="fa fa-angle-down"></i>
            <ul>
                <li><a href="/admin/sodokhoi">Sơ đồ khối</a></li>
                <li><a href="/admin/sodokhoi">Chức năng khối</a>  </li>
            </ul>
        </li>

        <li>Cấu trúc phần cứng <i class="fa fa-angle-down"></i>
            <ul>
                <li><a href="/admin/cautruc">Cấu trúc chung</a></li>
                <li><a href="/admin/cautruc">Mặt trước</a>  </li>
                <li><a href="/admin/cautruc">Mặt sau</a> </li>
                <li><a href="/admin/cautruc">Các loại Card</a> </li>
            </ul>
        </li>
        -->

            <li><a href="/admin/trienkhaithuhoi">TRIỂN KHAI LẮP ĐẶT</a></li>
            <li><a href="#">THỰC HÀNH KHAI BÁO</a>
                <ul>
                    <li><a href="/admin/giaithichcaulenh">HƯỚNG DẪN THỰC HÀNH</a></li>
                    <li><a href="/admin/thuchanhkhaibao">THỰC HÀNH</a></li>
                    <li><a href="/admin/tracnghiem">KIỂM TRA TRẮC NGHIỆM</a></li>

                </ul>
            </li>
            <li><a href="#">BẢO QUẢN, BẢO DƯỠNG</a>
                <ul>
                    <li><a href="/admin/bq">BẢO QUẢN</a></li>
                    <li><a href="/admin/bd1">BẢO DƯỠNG CẤP 1</a> </li>
                    <li><a href="/admin/bd2">BẢO DƯỠNG CẤP 2</a> </li>
                    <li><a href="/admin/pan">MỘT SỐ PAN VÀ CÁCH KHẮC PHỤC</a></li>

                </ul>
            </li>




            <li>

                <form action="{{ route('voyager.logout') }}" method="POST" class="form-logout"
                    style="margin-left:20px;">
                    {{ csrf_field() }}



                    @php
                    if(Auth::user() != null) {
                    echo "<i>" . Auth::user()->email . "</i>";
                    echo '<button type="submit" class="btn btn-danger btn-block"> Đăng xuất</button>';
                    }else {
                    echo '<a href="/admin/login" class="btn btn-block login-button" style="margin-left:20px;"> <i>Đăng
                            nhập</i> </a>';
                    }

                    @endphp

                </form>

            </li>


        </ul>
    </div>
