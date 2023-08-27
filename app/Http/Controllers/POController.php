<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

use App\Models\Cauhinh;
use App\Models\Bangsoquay;
use App\Models\TrungkeCO;
use App\Models\TrungkeE1;
use App\Models\Huong;
use App\Models\MaHuong;
use App\Models\TongdaiClass;
use App\Models\Thuebao;



class POController extends Controller
{
    public function ajaxPO(Request $request) {
        $po_input = $request->po_input;
        $re = '/^\*([0-9]{2})\*?([0-9]*)\#/m';

        preg_match_all($re, $po_input, $matches, PREG_SET_ORDER, 0);

        // Print the entire match result
        //var_dump($matches);
        $result = array(
            'result' => 'sucess',
            'data'   => 'ajaxPO'
        );

        if(count($matches) == 0) {
            $result = array(
                'result' => 'error',
                'data'   => 'ajaxPO',
                'message' => 'Cú pháp lệnh không chính xác, không thực thi câu lệnh',
                'play_sound' => 0,
                'sound'     => ''
            );
        }else {
            $ar_macth = $matches[0];
            $code = $ar_macth[1];
            $thamso = $ar_macth[2];
            $result = $this->exceCmd($code, $thamso);
            //var_dump($result);
        }

        return Response::json($result);

    }


    private function exceCmd($code, $thamso) {
        if($code == "36") { return $this->execCmd36($thamso); }
        elseif($code == "37") { return $this->execCmd37($thamso); }
        elseif($code == "38") { return $this->execCmd38($thamso); }
        elseif($code == "39") { return $this->execCmd39($thamso); }
        elseif($code == "40") { return $this->execCmd40($thamso); }
        elseif($code == "41") { return $this->execCmd41($thamso); }
        elseif($code == "42") { return $this->execCmd42($thamso); }
        elseif($code == "44") { return $this->execCmd44($thamso); }
        elseif($code == "45") { return $this->execCmd45($thamso); }
        elseif($code == "50") { return $this->execCmd50($thamso); }
        elseif($code == "55") { return $this->execCmd55($thamso); }
        elseif($code == "60") { return $this->execCmd60($thamso); }
        elseif($code == "61") { return $this->execCmd61($thamso); }
        elseif($code == "62") { return $this->execCmd62($thamso); }
        elseif($code == "63") { return $this->execCmd63($thamso); }
        elseif($code == "64") { return $this->execCmd64($thamso); }
        elseif($code == "65") { return $this->execCmd65($thamso); }
        elseif($code == "66") { return $this->execCmd66($thamso); }
        elseif($code == "67") { return $this->execCmd67($thamso); }
        elseif($code == "68") { return $this->execCmd68($thamso); }
        elseif($code == "69") { return $this->execCmd69($thamso); }
        else {
            return array(
                'result' => 'success',
                'thamso' => $thamso,
                'data'   => '',
                'message' => 'Sai cú pháp',
                'play_sound' => 1,
                'sound'     => 'miss',
                'output'    => ''
            );
        }
    }

    private function execCmd36($thamso) {

    }

    private function execCmd37($thamso) {

    }

    //Đã có code xử lý
    private function execCmd38($thamso) { //Ma huong
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *38# *38* y1y2y3# *38*y1y2y3x1x2x3x4x5x6#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        if($thamso_length == 0) { //*38# - xoa toan bo
            $record = MaHuong::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
            ])->delete();
            $mesage = "Thực thi thành công, đã xóa toàn bộ mã hướng.";
        }elseif($thamso_length == 3) { //*38* y1y2y3# - xoa 1 ma huong
            $record = MaHuong::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['mahuong_dinhtuyen', $thamso],
            ])->delete();
            $mesage = "Thực thi thành công, đã xóa mã hướng.";
        }elseif($thamso_length == 10) { //*38*y1y2y3x1x2x3x4x5x6# - them 1 ma huong
            $arTmp = str_split($thamso);
            $mahuong_dinhtuyen = $arTmp[0] . $arTmp[1] . $arTmp[2];
            $sochan = $arTmp[3];
            $min_soquay = $arTmp[4];
            $huong_id = $arTmp[5] . $arTmp[6];
            $tongsochuso = $arTmp[7];
            $ma_huong_id = $arTmp[8] . $arTmp[9];

            $result = MaHuong::create([
                'user_id' => $current_user_id,
                'cauhinh_id' => $cauhinh_active,
                'mahuong_id' => $ma_huong_id,
                'mahuong_dinhtuyen' => $mahuong_dinhtuyen,
                'sochan' => $sochan,
                'min_soquay' => $min_soquay,
                'huong_id' => $huong_id,
                'tongso_chuso_mahuong' => $tongsochuso,
                'created_at' => now(),
            ]);

            $mesage = "Thực thi thành công, đã thêm mã hướng.";
        }else {
            $mesage = "Sai cú pháp";
            $sound = 'miss';
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    //Đã có code xử lý
    private function execCmd39($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *39# *39*y1y2# *39*y1y2x1x2x3#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        if($thamso_length == 0) { //*38# - xoa toan bo
            $record = Huong::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
            ])->delete();
            $mesage = "Thực thi thành công, đã xóa toàn bộ  hướng.";
        }elseif($thamso_length == 2) { //*38* y1y2y3# - xoa 1 ma huong
            $record = Huong::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['huong_id', $thamso],
            ])->delete();
            $mesage = "Thực thi thành công, đã xóa  hướng.";
        }elseif($thamso_length == 7) { //*38*y1y2y3x1x2x3x4x5x6# - them 1 ma huong
            $arTmp = str_split($thamso);
            $huong_id = $arTmp[0] . $arTmp[1];
            $loai = $arTmp[2];
            $thanhphan = $arTmp[3] . "," . $arTmp[4];

            $result = Huong::create([
                'user_id' => $current_user_id,
                'cauhinh_id' => $cauhinh_active,
                'huong_id' => $huong_id,
                'loai' => $loai,
                'thanhphan' => $thanhphan,
                'created_at' => now()
            ]);

            $mesage = "Thực thi thành công, đã thêm  hướng.";
        }else {
            $mesage = "Sai cú pháp";
            $sound = 'miss';
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    private function execCmd40($thamso) {

    }

    //Đã có code xử lý
    private function execCmd41($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *39# *39*y1y2# *39*y1y2x1x2x3#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';

        if($thamso_length == 3){ //Doi 3 so dau
            $record = Cauhinh::where([
                ['user_id', $current_user_id],
                ['stt', $cauhinh_active],
            ])->first();

            $record->prefix = $thamso;
            $record->save();
            $mesage = "Thực thi thành công, đã thay đổi prefix";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    //Đã có code xử lý
    private function execCmd42($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *39# *39*y1y2# *39*y1y2x1x2x3#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';

        if($thamso_length == 3){ //Doi 3 so dau
            $records = Thuebao::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
            ])->get();

            $socuoi = $thamso;
            foreach($records as $record) {
                $record->socuoi = $socuoi;
                $record->save();
                $socuoi += 1;
            }
            $mesage = "Thực thi thành công, đã thay số bắt đầu từ " . $thamso;
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    private function execCmd44($thamso) {

    }

    private function execCmd45($thamso) {

    }

    //Đã có code xử lý
    private function execCmd50($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *39# *39*y1y2# *39*y1y2x1x2x3#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';

        if($thamso_length == 2){ //Doi 3 so dau
            //session(['cauhinh_active' => $thamso]);
            $mesage = "Thực thi thành công, thay đổi sang cấu hình " . $thamso;
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    //Đã có code xử lý
    private function execCmd55($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *39# *39*y1y2# *39*y1y2x1x2x3#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';

        if($thamso_length == 6){ //Doi 3 so cuoi 1 thue bao cu the
            $socu = substr($thamso, 0, 3);
            $somoi = substr($thamso, 3, 3);

            $record = Thuebao::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['socuoi', $socu],
            ])->first();

            $record->socuoi = $somoi;
            $record->save();
            $mesage = "Thực thi thành công, đã thay sang số mới " . $somoi;
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => ''
        );
        return $result;
    }

    private function execCmd60($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *60*X1X2 #
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 2){ //Số thứ tự luồng E1
            $record = TrungkeCO::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['id_stt', $thamso],
            ])->first();

            $output = "";
            $led1 = "0";
            $led2 = $record->loai;
            if($record->mo_khoa=0) $led2 = 2;
            $led3 = $record->dieukhienxa;
            $led4 = "";


            /*
            kieu_goivao 0 DISA / 1 PO
            tinhcuoc 0 thời gian / 1 đảo cực
            0: Gọi vào qua PO, tính cước theo thời gian
            1: Gọi vào qua PO, tính cước theo đảo cực
            2: Gọi vào qua DISA, tính cước theo thời gian
            3: Gọi vào qua DISA, tính cước theo đảo cực
            */


            if($record->kieu_goivao == 1 && $record->tinhcuoc = 0) {
                $led4 = '0';
            }elseif($record->kieu_goivao == 1 && $record->tinhcuoc = 1) {
                $led4 = '1';
            }elseif($record->kieu_goivao == 0 && $record->tinhcuoc = 0) {
                $led4 = '2';
            }elseif($record->kieu_goivao == 0 && $record->tinhcuoc = 1) {
                $led4 = '3';
            }

            $output = $led1 . $led2 . $led3 . $led4;

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;

    }

    private function execCmd61($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *61*X#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        if($thamso_length == 1){ //Số thứ tự luồng E1
            $record = TrungkeE1::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['id_stt', $thamso],
            ])->first();

            $output = '0' . $record->clock;
            if($record->vitri_batdau_goi_ra == 1) {
                $output .= '0' . $record->vitri_batdau_goi_ra;
            }else {
                $output .= $record->vitri_batdau_goi_ra;
            }

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;

    }
    private function execCmd62($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *62*X1X2X3 #
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 3){ //3 số cuối tb
            $record = Thuebao::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['socuoi', $thamso],
            ])->first();

            $output = "";
            $led1 = $record->class_id;
            $led2 = $record->quyen;
            $led3 = $record->uutien;
            $led4 = $record->loai;

            $output = $led1 . $led2 . $led3 . $led4;

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => $record,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;
    }

    private function execCmd63($thamso) {

    }
    private function execCmd64($thamso) {

    }
    private function execCmd65($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *65 #
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 0){ //không tham số

            $output = "";
            $led1 = "0";
            $led2 = "0";
            $led3 = "0";
            $led4 = $cauhinh_active;

            $output = $led1 . $led2 . $led3 . $led4;

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => null,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;

    }
    private function execCmd66($thamso) { //3 số đầu danh bạ
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *66 #
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 0){ //không tham số

            $record = Cauhinh::where([
                ['user_id', $current_user_id],
                ['stt', $cauhinh_active],
            ])->first();

            $prefix = $record->prefix;

            $arPrefix = str_split($prefix);

            $output = "";
            $led1 = "0";
            $led2 = $arPrefix[0];
            $led3 = $arPrefix[1];
            $led4 = $arPrefix[2];

            $output = $led1 . $led2 . $led3 . $led4;

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => null,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;
    }
    private function execCmd67($thamso) {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        // CMD *66 #
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 0){ //không tham số

            $record = Cauhinh::where([
                ['user_id', $current_user_id],
                ['stt', $cauhinh_active],
            ])->first();

            $sobatdau = $record->sobatdau;

            $arTmp = str_split($sobatdau);

            $output = "";
            $led1 = "0";
            $led2 = $arTmp[0];
            $led3 = $arTmp[1];
            $led4 = $arTmp[2];

            $output = $led1 . $led2 . $led3 . $led4;

            $mesage = "Lấy số liệu thành công";
        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => null,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;
    }
    private function execCmd68($thamso) {
        //Kiểm tra danh bạ bất kỳ (3 số sau)
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');
        //  *68*X1X2#
        $thamso_length = strlen($thamso);
        $mesage = "";
        $record = null;
        $sound = 'sucess';
        $output = '';

        $thamso = (int)$thamso;

        if($thamso_length == 2){ //không tham số
            $arThamso = str_split($thamso);
            $card = $arThamso[0];
            $thuebao_id = $arThamso[1];

            $record = Thuebao::where([
                ['user_id', $current_user_id],
                ['cauhinh_id', $cauhinh_active],
                ['thuebao_id', $thuebao_id],
                ['card', $card],
            ])->first();

            if($record == null) {
                $output = "0000";
                $mesage = "Tham số không chính xác";
            }else {
                $socuoi = $record->socuoi;
                $arTmp = str_split($socuoi);

                $output = "";
                $led1 = "0";
                $led2 = $arTmp[0];
                $led3 = $arTmp[1];
                $led4 = $arTmp[2];

                $output = $led1 . $led2 . $led3 . $led4;

                $mesage = "Lấy số liệu thành công";
            }


        }else {
            $mesage = "Tham số không chính xác";
        }
        $result = array(
            'result' => 'success',
            'thamso' => $thamso,
            'data'   => null,
            'message' => $mesage,
            'play_sound' => 1,
            'sound'     => $sound,
            'output'     => $output
        );
        return $result;
    }
    private function execCmd69($thamso) {

    }

















}
