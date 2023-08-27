<div class="container menu-main">
    <div class="banner">
        <img src="/storage/images/banner.jpg" class="img" />
    </div>
    <div class="tutorial">
        <ul>
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/admin/thongsokythuat">Tính năng và thông số kỹ thuật</a></li>
            <li><a href="/admin/sodokhoi">Sơ đồ khối và chức năng</a></li>
            <li><a href="#">Đặc điểm kết cấu</a>
                <ul>
                    <li><a href="/admin/cautruc">Cấu trúc chung</a></li>
                    <li><a href="/admin/cacloaicard">Chức năng các Card</a></li>
                    <li><a href="/admin/pan">Một số PAN và cách khắc phục</a></li>

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

            <li>Khai thác sử dụng <i class="fa fa-angle-down"></i>
                <ul>
                    <li><a href="/admin/trienkhaithuhoi">Triển khai, lắp đặt</a></li>
                    <li><a href="/admin/khaibaoPO">Khai báo khối TDM bằng máy trực PO</a> </li>
                    <li><a href="/admin/khaibaoPM">Khai báo khối TDM bằng phần mềm</a> </li>
                    <li><a href="/admin/thuebaoipu">Khai báo khối IPU</a> </li>
                </ul>
            </li>
            <li><a href="#">Bảo quản bảo dưỡng</a>
                <ul>
                    <li><a href="/admin/bq">Bảo quản</a></li>
                    <li><a href="/admin/bd1">Bảo dưỡng cấp 1</a> </li>
                    <li><a href="/admin/bd2">Bảo dưỡng cấp 2</a> </li>
                </ul>
            </li>




            <li>

                <form action="{{ route('voyager.logout') }}" method="POST" class="form-logout" style="margin-left:20px;">
                    {{ csrf_field() }}



                    @php
                    if(Auth::user() != null) {
                        echo "<i>" . Auth::user()->email . "</i>";
                        echo '<button type="submit" class="btn btn-danger btn-block"> Đăng xuất</button>';
                    }else {
                        echo '<a href="/admin/login" class="btn btn-block login-button" style="margin-left:20px;"> <i>Đăng nhập</i> </a>';
                    }

                    @endphp

                </form>

            </li>


        </ul>
    </div>
