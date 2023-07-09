<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use Illuminate\Support\Facades\Auth;

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

    public function khaibaoPO(){
        return view('khaibaoPO', [

        ]);
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

        $bangsoquay = $this->getBangsoquay($current_user_id, $cauhinh_active);
        $trungkeCOs = $this->getTrungkeCO($current_user_id, $cauhinh_active);
        $trungkeE1s = $this->getTrungkeE1($current_user_id, $cauhinh_active);
        $huongs = $this->getHuong($current_user_id, $cauhinh_active);
        $mahuongs = $this->getMahuong($current_user_id, $cauhinh_active);
        $tongdaiClass = $this->getTongdaiClass($current_user_id, $cauhinh_active);
        $thuebaos = $this->getThuebao($current_user_id, $cauhinh_active);

        return view('khaibaoPM', compact(
            'arCauhinh',
            'cauhinh_active',
            'bangsoquay',
            'trungkeCOs',
            'trungkeE1s',
            'huongs',
            'mahuongs',
            'tongdaiClass',
            'thuebaos',
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

        if($task == 'trungkeE1') {
            $luong = $request->luong;
            $vitri_batdau_goi_ra = $request->vitri_batdau_goi_ra;
            $vitri_batdau_goi_ra = $request->vitri_batdau_goi_ra;
            $vitri_batdau_goi_vao = $request->vitri_batdau_goi_vao;
            $clock = $request->clock;
            $this->UpdateCauhinhE1($current_user_id, $cauhinh_active, $luong, $vitri_batdau_goi_ra, $vitri_batdau_goi_vao, $clock);
        }


        return Response::json($result);
    }


    private function getCauhinh($user_id) {
        $cauhinhs = Cauhinh::where('user_id', $user_id)->get();
        return $cauhinhs;
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

    private function getTongdaiClass($user_id, $cauhinh_id) {
        $records = TongdaiClass::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
        return $records;
    }

    private function getThuebao($user_id, $cauhinh_id) {
        $records = Thuebao::where([
            ['user_id', $user_id],
            ['cauhinh_id', $cauhinh_id]
        ])->get();
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

















}
