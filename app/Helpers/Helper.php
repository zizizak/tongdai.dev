<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

use App\Models\Cauhinh;
use App\Models\Bangsoquay;
use App\Models\TrungkeCO;
use App\Models\TrungkeE1;
use App\Models\Huong;
use App\Models\MaHuong;
use App\Models\TongdaiClass;
use App\Models\Thuebao;

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'Y/m/d')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}


if (!function_exists('copyCauhinhData')) {
    function copyCauhinhData($from, $to, $user_id)
    {
        //echo sprintf("<br/> Copy from %s to %s user id: %s", $from, $to, $user_id); die('xxxx');

        error_log(sprintf("<br/> Copy from %s to %s user id: %s", $from, $to, $user_id));

        //1. Cau hinh
        copyCauhinh($from, $to, $user_id);

        //2. Bảng số quay - bangsoquay
        copyBangSoQuay($from, $to, $user_id);

        //3. Trung kế CO - trungkeCO
        copyTrungkeCO($from, $to, $user_id);

        //4. Trung kế E1 - trungkeE1
        copyTrungkeE1($from, $to, $user_id);

        //5. Hướng - huong
        copyHuong($from, $to, $user_id);

        //6. Mã hướng - mahuong
        copyMaHuong($from, $to, $user_id);

        //7. Class - tongdai_class
        copyClass($from, $to, $user_id);

        //8. Thuê bao - thuebao
        copyThuebao($from, $to, $user_id);

        return true;
    }
}

if (!function_exists('copyCauhinh')) {
    function copyCauhinh($from, $to, $user_id)
    {
        //echo sprintf("<br/> copyCauhinh from %s to %s user id: %s", $from, $to, $user_id);
        error_log(sprintf("<br/> copyCauhinh from %s to %s user id: %s", $from, $to, $user_id));
        $record = Cauhinh::where([
            ['user_id', $user_id],
            ['stt', $from],
        ])->first();

        $record_udpate = Cauhinh::where([
            ['user_id', $user_id],
            ['stt', $to],
        ])->first();

        $record_udpate->prefix = $record->prefix;
        $record_udpate->sobatdau = $record->sobatdau;
        $record_udpate->save();

    }
}



if (!function_exists('copyBangSoQuay')) {
    function copyBangSoQuay($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyBangSoQuay from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = Bangsoquay::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = Bangsoquay::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            Bangsoquay::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'dauso' => $item['dauso'],
                'so_digits' => $item['so_digits'],
                'created_at' => now()
            ]);
        }
    }
}

if (!function_exists('copyTrungkeCO')) {
    function copyTrungkeCO($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyTrungkeCO from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = TrungkeCO::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = TrungkeCO::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            TrungkeCO::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'card' => $item['card'],
                'id_stt' => $item['id_stt'],
                'loai' => $item['loai'],
                'mo_khoa' => $item['mo_khoa'],
                'tinhcuoc' => $item['tinhcuoc'],
                'kieu_goivao' => $item['kieu_goivao'],
                'created_at' => now()
            ]);
        }
    }
}

if (!function_exists('copyTrungkeE1')) {
    function copyTrungkeE1($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyTrungkeE1 from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = TrungkeE1::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = TrungkeE1::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            TrungkeE1::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'id_stt' => $item['id_stt'],
                'vitri_batdau_goi_ra' => $item['vitri_batdau_goi_ra'],
                'vitri_batdau_goi_vao' => $item['vitri_batdau_goi_vao'],
                'clock' => $item['clock'],
                'created_at' => now()
            ]);
        }
    }
}

if (!function_exists('copyHuong')) {
    function copyHuong($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyHuong from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = Huong::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = Huong::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            Huong::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'huong_id' => $item['huong_id'],
                'loai' => $item['loai'],
                'thanhphan' => $item['thanhphan'],
                'created_at' => now()
            ]);
        }
    }
}

if (!function_exists('copyMaHuong')) {
    function copyMaHuong($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyMaHuong from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = MaHuong::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = MaHuong::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            MaHuong::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'mahuong_id' => $item['mahuong_id'],
                'mahuong_dinhtuyen' => $item['mahuong_dinhtuyen'],
                'min_soquay' => $item['min_soquay'],
                'huong_id' => $item['huong_id'],
                'tongso_chuso_mahuong' => $item['tongso_chuso_mahuong'],
                'sochan' => $item['sochan'],
                'created_at' => now()
            ]);

        }
    }
}

if (!function_exists('copyClass')) {
    function copyClass($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyClass from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = TongdaiClass::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = TongdaiClass::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            TongdaiClass::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'class_id' => $item['class_id'],
                'digits' => $item['digits'],
                'quyen' => $item['quyen'],
                'created_at' => now()
            ]);

        }
    }
}

if (!function_exists('copyThuebao')) {
    function copyThuebao($from, $to, $user_id)
    {
        error_log(sprintf("<br/> copyThuebao from %s to %s user id: %s", $from, $to, $user_id));
        //Xoa du lieu cau hinh $to
        $deleted = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $to],
        ])->delete();

        //Goi DB lay ra cac ban ghi cau hinh $from
        $results = Thuebao::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $from],
            ]
        )->get();

        //Duyet tung ban ghi luu vao cau hinh $to
        foreach($results as $item) {
            Thuebao::create([
                'user_id' => $user_id,
                'cauhinh_id' => $to,
                'thuebao_id' => $item['thuebao_id'],
                'socuoi' => $item['socuoi'],
                'class_id' => $item['class_id'],
                'card' => $item['card'],
                'quyen' => $item['quyen'],
                'uutien' => $item['uutien'],
                'loai' => $item['loai'],
                'created_at' => now()
            ]);
        }
    }
}


if (!function_exists('generateSelect')) {
    function generateSelect($name, $id, $options, $currentValue) {
        $selectHTML = '<select class="form-control" id="' . $id . '" name="' . $name . '">';
        foreach ($options as $option) {
            if ($option === $currentValue) {
                $selectHTML .= '<option selected>' . $option . '</option>';
            } else {
                $selectHTML .= '<option>' . $option . '</option>';
            }
        }
        $selectHTML .= '</select>';
        return $selectHTML;
    }
}

if (!function_exists('generateSelectV2')) {
    function generateSelectV2($name, $id, $options, $currentValue) {
        $selectHTML = '<select class="form-control" id="' . $id . '" name="' . $name . '">';
        foreach ($options as $key => $option) {
            if ($key === $currentValue) {
                $selectHTML .= '<option selected value="' . $key . '" >' . $option . '</option>';
            } else {
                $selectHTML .= '<option selected value="' . $key . '" >' . $option . '</option>';
            }
        }
        $selectHTML .= '</select>';
        return $selectHTML;
    }
}
