<?php

namespace App\Http\Controllers;

use App\IpuTrungkeE1;
use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

use TCG\Voyager\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;

use App\Models\TrungkeE1;
use App\Models\Cauhinh;
use App\IpuTrungkeIp;



class IPUController extends Controller
{

    public function ipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('ipu', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }


    public function ipu_trungke_ip_e1(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('ipu_trungke_ip_e1', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }


    public function thuebaoipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('thuebaoipu', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }


    public function dialplan(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('dialplan', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }

    public function huonggoivaoipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('huonggoivaoipu', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }

    public function huonggoiraipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinhs = $this->getCauhinh($current_user_id);
        $arCauhinh = [];
        foreach ($cauhinhs as $cauhinh) {
            $arCauhinh[] = $cauhinh->stt;
        }

        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('huonggoiraipu', compact(
            'arCauhinh',
            'cauhinh_active',
        ));
    }

    public function ajaxipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');

        $result = array(
            'result' => 'sucess',
            'data'   => 'task not found'
        );

        $task = $request->task;


        if ($task == 'insert_update_trungke_ip') {
            $trungke_ip_id = $request->trungke_ip_id;
            $tentrungke = $request->tentrungke;
            $taikhoan = $request->taikhoan;
            $diachiketnoi = $request->diachiketnoi;
            $matkhau = $request->matkhau;
            $chuanbaohieu = $request->chuanbaohieu;
            $thu1 = $request->thu1;
            $thu2 = $request->thu2;
            $thu3 = $request->thu3;
            $thu4 = $request->thu4;
            $thu5 = $request->thu5;
            $outboundproxy = $request->outboundproxy;
            $message = $this->insert_update_trungke_ip($current_user_id, $trungke_ip_id, $tentrungke, $taikhoan, $diachiketnoi, $matkhau, $chuanbaohieu,
                                             $thu1, $thu2, $thu3, $thu4, $thu5, $outboundproxy);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_trungke_ip') {
            $trungke_ip_id = $request->trungke_ip_id;
            $message = $this->delete_trungke_ip($current_user_id, $trungke_ip_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'insert_update_trungke_e1') {
            $trungke_ip_id = $request->trungke_e1_id;
            $tentrungke = $request->tentrungke_e1;
            $id_luong = $request->idluong;
            $chieugoicackenh = $request->chieugoicackenh;
            $baohieu = $request->baohieu;
            $message = $this->insert_update_trungke_e1($current_user_id, $trungke_ip_id, $tentrungke, $id_luong, $chieugoicackenh, $baohieu);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_trungke_e1') {
            $trungke_ip_id = $request->trungke_ip_id;
            $message = $this->delete_trungke_ip($current_user_id, $trungke_ip_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        return Response::json($result);
    }

    public function publicajaxipu(Request $request)
    {
        $current_user_id = Auth::user()->getKey();
        $cauhinh_active = session('cauhinh_active');

        $result = array(
            'result' => 'success',
            'data'   => 'publicajaxipu'
        );

        $task = $request->task;

        if ($task == 'get_trungke_ip') {
            $data = $this->get_trungke_ip($current_user_id);
            $result = array(
                'result' => 'success',
                'data'   => $data,
                'message' => ''
            );
        }
        if ($task == 'get_trungke_e1') {
            $data = $this->get_trungke_e1($current_user_id);
            $result = array(
                'result' => 'success',
                'data'   => $data,
                'message' => ''
            );
        }

        return Response::json($result);
    }

    private function getCauhinh($user_id)
    {
        $cauhinhs = Cauhinh::where('user_id', $user_id)->get();
        return $cauhinhs;
    }


    private function get_trungke_ip($user_id)
    {
        $cauhinhs = IpuTrungkeIp::where('user_id', $user_id)->get();
        return $cauhinhs;
    }

    private function get_trungke_e1($user_id)
    {
        $cauhinhs = IpuTrungkeE1::where('user_id', $user_id)->get();
        return $cauhinhs;
    }

    /** Ajax add/edit/delete function */
    private function insert_update_trungke_ip($user_id, $trungke_ip_id, $tentrungke, $taikhoan, $diachiketnoi, $matkhau, $chuanbaohieu,
    $thu1, $thu2, $thu3, $thu4, $thu5, $outboundproxy) {
        $message = "";
        if($trungke_ip_id > 0) { //Sửa
            $record = IpuTrungkeIp::where([
                ['user_id', $user_id],
                ['id', $trungke_ip_id],
            ])->first();

            $record->tentrungke = $tentrungke;
            $record->taikhoan = $taikhoan;
            $record->diachiketnoi = $diachiketnoi;
            $record->matkhau = $matkhau;
            $record->chuanbaohieu = $chuanbaohieu;
            $record->thu1 = $thu1;
            $record->thu2 = $thu2;
            $record->thu3 = $thu3;
            $record->thu4 = $thu4;
            $record->thu5 = $thu5;
            $record->outboundproxy = $outboundproxy;
            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuTrungkeIp::create([
                'user_id' => $user_id,
                'tentrungke' => $tentrungke,
                'taikhoan' => $taikhoan,
                'diachiketnoi' => $diachiketnoi,
                'matkhau' => $matkhau,
                'chuanbaohieu' => $chuanbaohieu,
                'thu1' => $thu1,
                'thu2' => $thu2,
                'thu3' => $thu3,
                'thu4' => $thu4,
                'thu5' => $thu5,
                'outboundproxy' => $outboundproxy,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_trungke_ip($user_id, $trungke_ip_id){
        $record = IpuTrungkeIp::where([
            ['user_id', $user_id],
            ['id', $trungke_ip_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }


    private function insert_update_trungke_e1($user_id, $trungke_ip_id, $tentrungke, $id_luong, $chieugoicackenh, $baohieu) {
        $message = "";
        if($trungke_ip_id > 0) { //Sửa
            $record = IpuTrungkeE1::where([
                ['user_id', $user_id],
                ['id', $trungke_ip_id],
            ])->first();

            $record->tentrungke = $tentrungke;
            $record->id_luong = $id_luong;
            $record->chieugoicackenh = $chieugoicackenh;
            $record->baohieu = $baohieu;
            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuTrungkeE1::create([
                'user_id' => $user_id,
                'tentrungke' => $tentrungke,
                'id_luong' => $id_luong,
                'chieugoicackenh' => $chieugoicackenh,
                'baohieu' => $baohieu,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_trungke_e1($user_id, $trungke_ip_id){
        $record = IpuTrungkeE1::where([
            ['user_id', $user_id],
            ['id', $trungke_ip_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }



}
