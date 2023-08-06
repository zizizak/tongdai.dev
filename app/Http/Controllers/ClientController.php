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



class ClientController extends Controller
{
    public function thongsokythuat(){
        $id = 2;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function sodokhoi(){
        $id = 3;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function cautruc(){
        $id = 4;
        return view('view-page', [
            'pageObj' => Page::findOrFail($id)
        ]);
    }

    public function khaibaoPO(Request $request){
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if(session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('khaibaoPO', compact(
            'arCauhinh',
            'cauhinh_active',
            //'bangsoquay',
            //'trungkeCOs',
            //'trungkeE1s',
            //'huongs',
            //'mahuongs',
            //'tongdaiClass',
           //'thuebaos',
        ));
    }

    public function khaibaoPM(Request $request){

        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if(session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        $trungkeE1s = $this->getTrungkeE1($current_user_id, $cauhinh_active);
        /*
        $bangsoquay = $this->getBangsoquay($current_user_id, $cauhinh_active);
        $trungkeCOs = $this->getTrungkeCO($current_user_id, $cauhinh_active);
        $huongs = $this->getHuong($current_user_id, $cauhinh_active);
        $mahuongs = $this->getMahuong($current_user_id, $cauhinh_active);
        $tongdaiClass = $this->getTongdaiClass($current_user_id, $cauhinh_active);
        $thuebaos = $this->getThuebao($current_user_id, $cauhinh_active);
        */

        return view('khaibaoPM', compact(
            'arCauhinh',
            'cauhinh_active',
            //'bangsoquay',
            //'trungkeCOs',
            'trungkeE1s',
            //'huongs',
            //'mahuongs',
            //'tongdaiClass',
           //'thuebaos',
        ));
    }


    public function ajax(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');

        $result = array(
            'result' => 'sucess',
            'data'   => 'abc'
        );

        $task = $request->task;

        if(strpos($task, "Update") >= 0 && $cauhinh_active == 0) {
            $result = array(
                'result' => 'error',
                'data'   => '',
                'mesage' => 'Cấu hình 0 không được phép thay đổi'
            );
            return $result;
        }

        if(strpos(strtolower($task), "del") >= 0 && $cauhinh_active == 0) {
            $result = array(
                'result' => 'error',
                'data'   => '',
                'mesage' => 'Cấu hình 0 không được phép thay đổi'
            );
            return $result;
        }


        if($task == 'UpdateTrungkeE1') {
            $luong = $request->luong;
            $vitri_batdau_goi_ra = $request->vitri_batdau_goi_ra;
            $vitri_batdau_goi_ra = $request->vitri_batdau_goi_ra;
            $vitri_batdau_goi_vao = $request->vitri_batdau_goi_vao;
            $clock = $request->clock;
            $this->UpdateCauhinhE1($current_user_id, $cauhinh_active, $luong, $vitri_batdau_goi_ra, $vitri_batdau_goi_vao, $clock);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => 'Cập nhật thành công'
            );
        }

        if($task == 'getTrungkeE1') {
            $data = $this->getTrungkeE1($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }

        if($task == 'UpdateThamsothuebao') {
            $id = $request->tstb_id;
            $class_id = $request->class_id;

            $uutien = $request->do_uu_tien;
            $loai = $request->tudong_tuthach;
            $mota = $request->mota;

            $quyen_thiet_lap = $request->quyen_thiet_lap;
            $quyen_nghe_xen = $request->quyen_nghe_xen;
            $quyen_thietlap_hoinghi = $request->quyen_thietlap_hoinghi;

            $quyen = $this->__parseInputQuyenThuebao($quyen_thiet_lap, $quyen_nghe_xen, $quyen_thietlap_hoinghi);


            $data = $this->UpdateThuebao($id, $class_id, $quyen, $uutien, $loai, $mota);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'UpdateThamsotrungkeCO') {
            $id = $request->thamsotrungke_id;
            $loai_tk = $request->loai_tk;
            $mo_khoa = $request->mo_khoa;
            $tinhcuoc = $request->tinhcuoc;
            $kieugoivao = $request->kieugoivao;
            $dieukhienxa = 0;
            if ( $request->has('tke_dieukhienxa')) {
                $dieukhienxa = $request->tke_dieukhienxa;
             }

            $data = $this->UpdateTrungkeCO($id, $loai_tk, $mo_khoa, $tinhcuoc, $kieugoivao, $dieukhienxa);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }
        if($task == 'UpdateKhaibaoThuebao') {
            $id = $request->khaibaothuebao_id;
            $prefix = $request->prefix;
            $sobatdau = $request->sobatdau;

            $data = $this->UpdateKhaibaoThuebao($id, $current_user_id, $cauhinh_active, $prefix, $sobatdau);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }
        if($task == 'UpdateKhaibaoClass') {
            $class_id = $request->khaibao_class_id_class_update;
            $digits = $request->khaibaoClass_digits;
            $quyen = $request->khaibaoClass_quyen;

            $data = $this->addClass($current_user_id, $cauhinh_active, $class_id, $digits, $quyen);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }


        if($task == 'delKhaibaoThuebao') {
            $id = $request->id;
            $data = $this->delClass($id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'delAllKhaibaoThuebao') {
            $class_id = $request->class_id;
            $data = $this->delAllKhaibaoThuebao($current_user_id, $cauhinh_active, $class_id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'UpdateHuong') {
            $huong_id = $request->khaibaoHuong_id_huong;
            $loai = $request->khaibaoHuong_loai;
            $thanhphan = $request->khaibaoHHuong_thanhphan;
            $loai_thanhphan = $request->khaibaoHHuong_loai_thanhphan;
            $data = $this->UpdateHuong($current_user_id, $cauhinh_active, $huong_id, $loai, $thanhphan, $loai_thanhphan);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'delKhaibaoHuong') {
            $id = $request->id;

            $count_huong_sudung = $this->kiemtraHuongdangsudung($current_user_id, $cauhinh_active, $id);
            if($count_huong_sudung > 0) {
                $data =  $count_huong_sudung;
                $result = array(
                    'result' => 'sucess',
                    'data'   => $data,
                    'message' => 'Xóa không thành công, hướng đang được sử dụng'
                );
            }else {
                $data = $this->delKhaibaoHuong($id);
                $result = array(
                    'result' => 'sucess',
                    'data'   => $data,
                    'message' => 'Xóa thành công'
                );
            }
        }


        if($task == 'UpdateMaHuong') {
            $mahuong_id = $request->Mahuong_mahuong_id;
            $mahuong_dinhtuyen = $request->Mahuong_huong_dinhtuyen;
            $sochan = $request->Mahuong_sochan;
            $min_soquay = $request->Mahuong_min_soquay;
            $huong_id = $request->Mahuong_huong;
            $data = $this->UpdateMaHuong($current_user_id, $cauhinh_active, $mahuong_id, $mahuong_dinhtuyen, $sochan, $min_soquay, $huong_id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'delMaHuong') {
            $id = $request->id;
            $data = $this->delMaHuong($id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }


        if($task == 'UpdateBangsoquay') {
            $dauso = $request->bangsoquay_dauso;
            $so_digits = $request->bangsoquay_digit;
            $data = $this->UpdateBangsoquay($current_user_id, $cauhinh_active, $dauso, $so_digits);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'delBangsoquay') {
            $id = $request->id;
            $data = $this->delBangsoquay($id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }

        if($task == 'UpdateSoDanhba') {
            $id = $request->thaydoiSDB_id;
            $somoi = $request->thaydoiSDB_somoi;
            $data = $this->UpdateSoDanhba($current_user_id, $cauhinh_active, $id, $somoi);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => 'Lưu thành công'
            );
        }



        return Response::json($result);
    }

    public function publicajax(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');

        $result = array(
            'result' => 'sucess',
            'data'   => 'publicajax'
        );

        $task = $request->task;

        if($task == 'getThuebao') {
            $card = $request->card;
            $data = $this->getThuebaoByCard($current_user_id, $cauhinh_active, $card);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }

        if($task == 'getTrungkeCO') {
            $data = $this->getTrungkeCO($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }

        if($task == 'getKhaibaoThuebao') {
            $data = $this->getCauhinhDetail($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }
        if($task == 'getKhaibaoClass') {

            $idClass = $request->idClass;
            $data = $this->getTongdaiClass($current_user_id, $cauhinh_active, $idClass);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }
        if($task == 'getHuong') {
            $data = $this->getHuong($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }
        if($task == 'getMaHuong') {
            $data = $this->getMahuong($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }
        if($task == 'getBangsoquay') {
            $data = $this->getBangsoquay($current_user_id, $cauhinh_active);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }


        if($task == 'getDanhba') {
            $sothuebao = $request->sothuebao;
            $data = $this->getDanhba($current_user_id, $cauhinh_active, $sothuebao);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }

        if($task == 'getQuickInfo') {
            $stt_id = $request->stt_id;
            $card_id = $request->card_id;
            $data = $this->getQuickInfo($current_user_id, $cauhinh_active, $card_id, $stt_id);
            $result = array(
                'result' => 'sucess',
                'data'   => $data,
                'message' => ''
            );
        }


        return Response::json($result);
    }


    private function getCauhinh($user_id) {
        $cauhinhs = Cauhinh::where('user_id', $user_id)->get();
        return $cauhinhs;
    }

    private function getCauhinhDetail($user_id, $cauhinh_id) {
        $records = Cauhinh::where([
            ['user_id', $user_id],
            ['stt', $cauhinh_id]
        ])->first();
        return $records;
    }

    private function getBangsoquay($user_id, $cauhinh_id) {
        $records = Bangsoquay::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getTrungkeCO($user_id, $cauhinh_id) {
        $records = TrungkeCO::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getTrungkeE1($user_id, $cauhinh_id) {
        $records = TrungkeE1::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getHuong($user_id, $cauhinh_id) {
        $records = Huong::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getMahuong($user_id, $cauhinh_id) {
        $records = MaHuong::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getTongdaiClass($user_id, $cauhinh_id, $idClass) {
        $records = TongdaiClass::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['class_id', $idClass]
        ])->get();
        return $records;

    }

    private function getDanhba($user_id, $cauhinh_id, $sothuebao) {

        $query = sprintf("SELECT a.*, CONCAT(b.prefix, a.socuoi) sodienthoai from thuebao a, cauhinh b WHERE a.cauhinh_id = b.stt and a.user_id = b.user_id  AND b.stt = %s AND b.user_id = %s", $cauhinh_id, $user_id);

        if($sothuebao != "") {
            $query .= " And a.socuoi like '%" . $sothuebao . "%'";
        }

        $records = DB::select($query);

        return $records;
    }

    private function getThuebaoByCard($user_id, $cauhinh_id, $card) {
        /*
        $records = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['card', $card]
        ])->get();
        return $records;
        */

        $query = sprintf("SELECT a.*, CONCAT(b.prefix, a.socuoi) sodienthoai from thuebao a, cauhinh b WHERE a.cauhinh_id = b.stt and a.user_id = b.user_id  AND b.stt = %s AND b.user_id = %s", $cauhinh_id, $user_id);

        if($card != "") {
            $query .= " And a.card = " . $card . "";
        }

        $records = DB::select($query);

        return $records;


    }



    /** Ajax function */

    private function UpdateCauhinhE1($user_id, $cauhinh_id, $stt, $vitri_batdau_goi_ra, $vitri_batdau_goi_vao, $clock) {
        $record = TrungkeE1::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['id_stt', $stt]
        ])->first();

        $record->vitri_batdau_goi_ra = $vitri_batdau_goi_ra;
        $record->vitri_batdau_goi_vao = $vitri_batdau_goi_vao;
        $record->clock = $clock;
        $record->save();
    }

    private function UpdateThuebao($id, $class_id, $quyen, $uutien, $loai, $mota) {
        $record = Thuebao::where([
            ['id', $id]
        ])->first();

        $record->class_id = $class_id;
        $record->quyen = $quyen;
        $record->uutien = $uutien;
        $record->loai = $loai;
        $record->mota = $mota;
        $record->save();
        return $record;
    }

    private function UpdateTrungkeCO($id, $loai, $mo_khoa, $tinhcuoc, $kieu_goivao, $dieukhienxa) {
        $record = TrungkeCO::where([
            ['id', $id]
        ])->first();

        $record->loai = $loai;
        $record->mo_khoa = $mo_khoa;
        $record->tinhcuoc = $tinhcuoc;
        $record->kieu_goivao = $kieu_goivao;
        $record->dieukhienxa = $dieukhienxa;
        $record->save();

        return $record;
    }

    private function UpdateKhaibaoThuebao($id, $user_id, $cauhinh_id, $prefix, $sobatdau) {
        $record = Cauhinh::where([
            ['id', $id]
        ])->first();

        $record->prefix = $prefix;
        $record->sobatdau = $sobatdau;
        $record->save();


        $this->resetThuebao($user_id, $cauhinh_id, $prefix, $sobatdau);

        return $record;
    }



    private function resetThuebao($user_id, $cauhinh_id, $prefix, $sobatdau){
        $records = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
        ])->get();

        $socuoi = $sobatdau;
        foreach($records as $record) {
            $record->socuoi = $socuoi;
            $record->save();
            $socuoi += 1;
        }
        /*
        $deleted = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
        ])->delete();

        $socuoi = $sobatdau;
        $arCard = [1,2,3,4,5,6,7,8];
        foreach($arCard as $card) {
            $stt = 1;
            for($i=1; $i<=8; $i++) {
                Thuebao::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'thuebao_id' => $stt,
                    'socuoi' => $socuoi,
                    'class_id' => 3,
                    'card' => $card,
                    'quyen' => 3,
                    'uutien' => 3,
                    'loai' => 0,
                    'created_at' => now()
                ]);
                $stt += 1;
                $socuoi += 1;
            }
        }
        **/

    }


    private function addClass($user_id, $cauhinh_id, $class_id, $digits, $quyen){
        $result = TongdaiClass::create([
            'user_id' => $user_id,
            'cauhinh_id' => $cauhinh_id,
            'class_id' => $class_id,
            'digits' => $digits,
            'quyen' => $quyen,
            'created_at' => now()
        ]);
        return $result;
    }

    private function delClass($id){
        $result = TongdaiClass::where('id', $id)->delete();
        return $result;
    }

    private function delAllKhaibaoThuebao($user_id, $cauhinh_id, $class_id){
        $result = TongdaiClass::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['class_id', $class_id],
        ])->delete();
        return $result;
    }

    private function UpdateHuong($user_id, $cauhinh_id, $huong_id, $loai, $thanhphan, $loai_thanhphan){
        $result = Huong::create([
            'user_id' => $user_id,
            'cauhinh_id' => $cauhinh_id,
            'huong_id' => $huong_id,
            'loai' => $loai,
            'thanhphan' => $thanhphan,
            'loai_thanhphan' => $loai_thanhphan,
            'created_at' => now()
        ]);
        return $result;

    }

    private function kiemtraHuongdangsudung($user_id, $cauhinh_id, $id) {
        $huong = Huong::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $cauhinh_id],
                ['id', $id],
            ])->first();

        $result = MaHuong::where(
            [
                ['user_id', $user_id],
                ['cauhinh_id', $cauhinh_id],
                ['huong_id', $huong->huong_id],
            ])->count();

        return $result;
    }

    private function delKhaibaoHuong($id){
        $result = Huong::where('id', $id)->delete();
        return $result;
    }


    private function UpdateMaHuong($user_id, $cauhinh_id, $mahuong_id, $mahuong_dinhtuyen, $sochan, $min_soquay, $huong_id){
        $result = MaHuong::create([
            'user_id' => $user_id,
            'cauhinh_id' => $cauhinh_id,
            'mahuong_id' => $mahuong_id,
            'mahuong_dinhtuyen' => $mahuong_dinhtuyen,
            'sochan' => $sochan,
            'min_soquay' => $min_soquay,
            'huong_id' => $huong_id,
            'created_at' => now()
        ]);
        return $result;
    }

    private function delMaHuong($id){
        $result = MaHuong::where('id', $id)->delete();
        return $result;
    }


    private function UpdateBangsoquay($user_id, $cauhinh_id, $dauso, $so_digits){
        $result = Bangsoquay::create([
            'user_id' => $user_id,
            'cauhinh_id' => $cauhinh_id,
            'dauso' => $dauso,
            'so_digits' => $so_digits,
            'created_at' => now()
        ]);
        return $result;
    }

    private function delBangsoquay($id){
        $result = Bangsoquay::where('id', $id)->delete();
        return $result;
    }

    private function UpdateSoDanhba($user_id, $cauhinh_id, $id, $somoi){
        $cauhinh = Cauhinh::where([
            ['user_id', $user_id],
            ['stt', $cauhinh_id],
        ])->first();

        $prefix = $cauhinh->prefix;
        $socuoi = str_replace($prefix, "", $somoi);

        //Kiểm tra số DB đã được khai báo chưa
        $record0 = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['socuoi', $socuoi],
        ])->first();

        $record = Thuebao::where([
            ['id', $id]
        ])->first();

        if($record0 != null) {
            //Nếu tồn tại giá trị bằng số mới thì đổi vị trí của 2 số
            //Lưu giá trị của số cũ
            $tmp_socuoi = $record->socuoi;
            $record0->socuoi = $tmp_socuoi;
            $record0->save();

        }

        //Lưu giá trị mới
        $record->socuoi = $socuoi;
        $record->save();

        return $record;
    }

    function getQuickInfo($user_id, $cauhinh_id, $card_id, $stt_id) {
        $record = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id],
            ['card', $card_id],
            ['thuebao_id', $stt_id],
        ])->first();

        //var_dump($record);
        $str = "";
        if($record != null){
            //Build response
            $str = '------  Thông số thuê bao ------ <br/> IdThuebao: {IdThuebao} <br/> IdCard: {IdCard}  <br/> Số danh bạ: {soDanhba} <br/> Loại: {Loai} <br/> Độ ưu tiên: {DoUutien}  <br/> Id Class: {IdClass} <br/> Quyền thiết lập hotline: {Q_hotline} <br/> Quyền nghe xen: {Q_nghexen} <br/> Quyền thiết lập hội nghị: {Q_hoinghi}  <br/><br/> ------ Mô tả thuê bao ------  <br/>Mô tả: {Mota}  <br/>';
            $str = str_replace("{IdThuebao}", $record->thuebao_id, $str);
            $str = str_replace("{IdCard}", $record->card, $str);
            $str = str_replace("{soDanhba}", $record->socuoi, $str);
            $str = str_replace("{Loai}", $record->loai, $str);
            $str = str_replace("{DoUutien}", $record->uutien, $str);
            $str = str_replace("{IdClass}", $record->class_id, $str);
            $str = str_replace("{Q_hotline}", $record->quyen, $str);
            $str = str_replace("{Q_nghexen}", $record->quyen, $str);
            $str = str_replace("{Q_hoinghi}", $record->quyen, $str);
            $str = str_replace("{Mota}", $record->mota, $str);
        }else {
            $str = "Không có dữ liệu";
        }
        return $str;
    }


    function __parseOuutputQuyenThuebao($q){
        $return= "000";
        switch($q)  {
            case 0:
                $return = "000";
                break;
            case 1:
                $return = "001";
                break;
            case 2:
                $return = "010";
                break;
            case 3:
                $return = "011";
                break;
            case 4:
                $return = "100";
                break;
            case 5:
                $return = "101";
                break;
            case 6:
                $return = "110";
                break;
            case 7:
                $return = "111";
                break;
            default:
              $return = "000";
        }
        return str_split($return);
    }


    function __parseInputQuyenThuebao($q_Online, $q_Nghexen, $q_Hoinghi){
        $return = 3;
        $tmp = $q_Online.$q_Nghexen.$q_Hoinghi;

        switch($tmp)  {
            case "000":
                $return = 0;
                break;
            case "001":
                $return = 1;
                break;
            case "010":
                $return = 2;
                break;
            case "011":
                $return = 3;
                break;
            case "100":
                $return = 4;
                break;
            case "101":
                $return = 5;
                break;
            case "110":
                $return = 6;
                break;
            case "111":
                $return = 7;
                break;
            default:
              $return = 3;
        }
        return $return;
    }



















}
