<style>
    .disabled {
    opacity: 0.5; /* Độ mờ */
    pointer-events: none; /* Không cho phép tương tác */
}
</style>
<div class="left-column">
    <div class="l-navbar" id="navbar">
        <h4>Khai báo khối IPU</h4>
        <div class="nav">
            @php
                $currentFullUrl = url()->full();
            @endphp

            <div>
                <div class="nav__toggle" id="nav-togger">
                    <box-icon name='chevron-right'></box-icon>
                </div>
                <ul class="nav__list">
                    <a href="/admin/thuebaoipu" class="nav__link {{ strpos($currentFullUrl, 'thuebaoipu') !== false ? 'activex' : '' }}">
                        <span class="nav__text">Thuê bao IP</span>
                    </a>
                    <a href="/admin/dialplan" class="nav__link {{ strpos($currentFullUrl, 'dialplan') !== false ? 'activex' : '' }}">
                        <span class="nav__text">Dial Plan</span>
                    </a>
                    <a href="/admin/ipu_trungke_ip_e1" class="nav__link {{ strpos($currentFullUrl, 'ipu_trungke_ip_e1') !== false ? 'activex' : '' }}">
                        <span class="nav__text">Trung kế IP/E1</span>
                    </a>
                    <a href="/admin/huonggoiraipu" class="nav__link {{ strpos($currentFullUrl, 'huonggoiraipu') !== false ? 'activex' : '' }}">
                        <span class="nav__text">Hướng gọi ra</span>
                    </a>
                    <a href="/admin/huonggoivaoipu" class="nav__link {{ strpos($currentFullUrl, 'huonggoivaoipu') !== false ? 'activex' : '' }}">
                        <span class="nav__text">Hướng gọi vào</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled ">Dịch vụ trượt cuộc gọi</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Dịch vụ nghe hộ</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Dịch vụ gọi hàng đợi</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Dịch vụ gọi hội nghị</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Dịch vụ Voice Menu</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Dịch vụ hộp thư thoại</span>
                    </a>
                    <a href="#" class="nav__link active">
                        <span class="disabled">Hệ thống</span>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
