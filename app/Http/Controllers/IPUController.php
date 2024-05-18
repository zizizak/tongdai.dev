<?php

namespace App\Http\Controllers;

use App\IpuDiaplan;
use App\IpuHuonggoira;
use App\IpuHuonggoivao;
use App\IpuThuebaoIp;
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

        return view('ipu/ipu_trungke_ip_e1', compact(
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

        $dialplans = $this->get_dialplan($current_user_id);

        return view('ipu/ipu_thuebaoip', compact(
            'arCauhinh',
            'cauhinh_active',
            'dialplans',
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

        $huonggoiras = $this->get_huonggoira($current_user_id);

        return view('ipu/ipu_dialplan', compact(
            'arCauhinh',
            'cauhinh_active',
            'huonggoiras',
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
        $list_trungke_ip = $this->get_trungke_ip($current_user_id);
        $list_trungke_e1 = $this->get_trungke_e1($current_user_id);
        $dialplans = $this->get_dialplan($current_user_id);

        return view('ipu/ipu_huonggoivao', compact(
            'arCauhinh',
            'cauhinh_active',
            'list_trungke_ip',
            'list_trungke_e1',
            'dialplans'
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

        $list_trungke_ip = $this->get_trungke_ip($current_user_id);
        $list_trungke_e1 = $this->get_trungke_e1($current_user_id);
        if (session('cauhinh_active') == NULL) {
            session(['cauhinh_active' => '0']);
        }
        if ($request->has('cauhinh_active')) {
            session(['cauhinh_active' => $request->input('cauhinh_active')]);
        }
        $cauhinh_active = session('cauhinh_active');

        return view('ipu/ipu_huonggoira', compact(
            'arCauhinh',
            'cauhinh_active',
            'list_trungke_ip',
            'list_trungke_e1',
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
            $trungke_e1_id = $request->trungke_e1_id;
            $message = $this->delete_trungke_e1($current_user_id, $trungke_e1_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'insert_update_huonggoira') {
            $update_id = $request->update_id;
            $tenhuonggoira = $request->tenhuonggoira;
            $dausoquay = $request->dausoquay;
            $sochugoi = $request->sochugoi;
            $trungke_id = $request->trungke_id;
            $digitchenvao = $request->digitchenvao;
            $digitbichan = $request->digitbichan;
            $message = $this->insert_update_huonggoira($current_user_id, $update_id , $tenhuonggoira, $dausoquay, $sochugoi, $trungke_id, $digitchenvao, $digitbichan);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_huonggoira') {
            $delete_id = $request->delete_id;
            $message = $this->delete_huonggoira($current_user_id, $delete_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'insert_update_dialplan') {
            $update_id = $request->update_id;
            $tendialplan = $request->tendialplan;
            $goinoidai = $request->goinoidai;
            $goihangdoi = $request->goihangdoi;
            $goihoinghi = $request->goihoinghi;
            $id_huonggoira = $request->id_huonggoira;
            $message = $this->insert_update_dialplan($current_user_id, $update_id , $tendialplan, $goinoidai, $goihangdoi, $goihoinghi, $id_huonggoira);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_dialplan') {
            $delete_id = $request->delete_id;
            $message = $this->delete_dialplan($current_user_id, $delete_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'insert_update_thuebaoip') {
            $update_id = $request->update_id;
            $sothuebao = $request->sothuebao;
            $tenthuebao = $request->tenthuebao;
            $matkhau = $request->matkhau;
            $id_dialplan = $request->id_dialplan;
            $baohieu = $request->baohieu;
            $thu1 = $request->thu1;
            $thu2 = $request->thu2;
            $thu3 = $request->thu3;
            $thu4 = $request->thu4;
            $thu5 = $request->thu5;
            $nat = $request->nat;
            $dtmf = $request->dtmf;
            $insecure = $request->insecure;
            $canreinvete = $request->canreinvete;
            $isagent = $request->isagent;
            $pickgroup = $request->pickgroup;
            $voicemail = $request->voicemail;

            $message = $this->insert_update_thuebaoip($current_user_id, $update_id, $sothuebao, $tenthuebao, $matkhau, $id_dialplan, $baohieu, $thu1, $thu2, $thu3, $thu4, $thu5, $nat, $dtmf, $insecure, $canreinvete, $isagent, $pickgroup, $voicemail);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_thuebaoip') {
            $delete_id = $request->delete_id;
            $message = $this->delete_thuebaoip($current_user_id, $delete_id);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'insert_update_huonggoivao') {
            $update_id = $request->update_id;
            $trungke_id = $request->trungke_id;
            $dausogoivao = $request->dausogoivao;
            $id_dialplan = $request->id_dialplan;

            $message = $this->insert_update_huonggoivao($current_user_id, $update_id, $trungke_id, $dausogoivao, $id_dialplan);
            $result = array(
                'result' => 'sucess',
                'data'   => '',
                'message' => $message
            );
        }

        if ($task == 'delete_huonggoivao') {
            $delete_id = $request->delete_id;
            $message = $this->delete_huonggoivao($current_user_id, $delete_id);
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
        if ($task == 'get_huonggoira') {
            $data = $this->get_huonggoira($current_user_id);
            $result = array(
                'result' => 'success',
                'data'   => $data,
                'message' => ''
            );
        }
        if ($task == 'get_dialplan') {
            $data = $this->get_dialplan($current_user_id);
            $result = array(
                'result' => 'success',
                'data'   => $data,
                'message' => ''
            );
        }
        if ($task == 'get_thuebaoip') {
            $data = $this->get_thuebaoip($current_user_id);
            $result = array(
                'result' => 'success',
                'data'   => $data,
                'message' => ''
            );
        }
        if ($task == 'get_huonggoivao') {
            $data = $this->get_huonggoivao($current_user_id);
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
        $data = IpuTrungkeIp::where('user_id', $user_id)->get();
        return $data;
    }
    private function get_trungke_e1($user_id)
    {
        $data = IpuTrungkeE1::where('user_id', $user_id)->get();
        return $data;
    }
    private function get_huonggoira($user_id)
    {
        $data = IpuHuonggoira::where('user_id', $user_id)->get();
        return $data;
    }
    private function get_dialplan($user_id)
    {
        $data = IpuDiaplan::where('user_id', $user_id)->get();
        return $data;
    }

    private function get_thuebaoip($user_id)
    {
        //$thuebaoIps = IpuThuebaoIp::where('user_id', $user_id)->get();
        $thuebaoIps = IpuThuebaoIp::join('ipu_diaplan', 'ipu_thuebao_ip.id_dialplan', '=', 'ipu_diaplan.id')
                    ->where('ipu_thuebao_ip.user_id', $user_id)
                    ->select('ipu_thuebao_ip.*', 'ipu_diaplan.tendialplan')
                    ->get();
        return $thuebaoIps;
    }

    private function get_huonggoivao($user_id)
    {
        $data = IpuHuonggoivao::join('ipu_diaplan', 'ipu_huonggoivao.id_dialplan', '=', 'ipu_diaplan.id')
                    ->where('ipu_huonggoivao.user_id', $user_id)
                    ->select('ipu_huonggoivao.*', 'ipu_diaplan.tendialplan')
                    ->get();
        return $data;
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
        $mesage = "Thực thi thành công trung kế E1, đã xóa bản ghi.";
        return $mesage;
    }

    private function insert_update_huonggoira($user_id, $update_id , $tenhuonggoira, $dausoquay, $sochugoi, $trungke_id, $digitchenvao, $digitbichan) {
        $message = "";
        $ar_trungke = explode("_", $trungke_id);
        $id_trungke = $ar_trungke[1];
        $loai_trungke = $ar_trungke[0];
        $id_trungke_e1 = 0;
        $id_trungke_ip = 0;
        $ten_trungke = "";
        if($loai_trungke == "E1") {
            $id_trungke_e1 = $id_trungke;
            $trungke = IpuTrungkeE1::find($id_trungke);
            if($trungke) {
                $ten_trungke = $trungke->tentrungke;
            }
        }else {
            $id_trungke_ip = $id_trungke;
            $trungke = IpuTrungkeIp::find($id_trungke);
            if($trungke) {
                $ten_trungke = $trungke->tentrungke;
            }
        }
        if($update_id > 0) { //Sửa
            $record = IpuHuonggoira::where([
                ['user_id', $user_id],
                ['id', $update_id],
            ])->first();

            $record->tenhuonggoira = $tenhuonggoira;
            $record->dausoquay = $dausoquay;
            $record->sochugoi = $sochugoi;
            $record->digitchenvao = $digitchenvao;
            $record->digitbichan = $digitbichan;

            $record->tentrungke = $ten_trungke;
            $record->loai_trungke = $loai_trungke;
            $record->id_trungke_e1 = $id_trungke_e1;
            $record->id_trungke_ip = $id_trungke_ip;

            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuHuonggoira::create([
                'user_id' => $user_id,
                'tenhuonggoira' => $tenhuonggoira,
                'dausoquay' => $dausoquay,
                'sochugoi' => $sochugoi,
                'digitchenvao' => $digitchenvao,
                'tentrungke' => $ten_trungke,
                'loai_trungke' => $loai_trungke,
                'id_trungke_e1' => $id_trungke_e1,
                'id_trungke_ip' => $id_trungke_ip,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_huonggoira($user_id, $delete_id){
        $record = IpuHuonggoira::where([
            ['user_id', $user_id],
            ['id', $delete_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }

    private function insert_update_dialplan($user_id, $update_id , $tendialplan, $goinoidai, $goihangdoi, $goihoinghi, $id_huonggoira) {
        $message = "";
        $ten_huonggoira = "";
        if(count($id_huonggoira) > 0) {
            $huonggoiras = IpuHuonggoira::whereIn('id', $id_huonggoira)->pluck('tenhuonggoira');
            $ten_huonggoira = $huonggoiras->implode(', ');
        }
        $str_id_huonggoira = implode(",", $id_huonggoira);

        if($update_id > 0) { //Sửa
            $record = IpuDiaplan::where([
                ['user_id', $user_id],
                ['id', $update_id],
            ])->first();
            $record->tendialplan = $tendialplan;
            $record->goinoidai = $goinoidai;
            $record->goihangdoi = $goihangdoi;
            $record->goihoinghi = $goihoinghi;
            $record->id_huonggoira = $str_id_huonggoira;
            $record->ten_huonggoira = $ten_huonggoira;
            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuDiaplan::create([
                'user_id' => $user_id,
                'tendialplan' => $tendialplan,
                'goinoidai' => $goinoidai,
                'goihangdoi' => $goihangdoi,
                'goihoinghi' => $goihoinghi,
                'id_huonggoira' => $str_id_huonggoira,
                'ten_huonggoira' => $ten_huonggoira,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_dialplan($user_id, $delete_id){
        $record = IpuDiaplan::where([
            ['user_id', $user_id],
            ['id', $delete_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }

    private function insert_update_thuebaoip($user_id, $update_id, $sothuebao, $tenthuebao, $matkhau ,$id_dialplan, $baohieu, $thu1, $thu2, $thu3, $thu4, $thu5, $nat, $dtmf, $insecure, $canreinvete, $isagent, $pickgroup, $voicemail) {
        $message = "";
        if($update_id > 0) { //Sửa
            $record = IpuThuebaoIp::where([
                ['user_id', $user_id],
                ['id', $update_id],
            ])->first();
            $record->sothuebao = $sothuebao;
            $record->tenthuebao = $tenthuebao;
            $record->matkhau = $matkhau;
            $record->id_dialplan = $id_dialplan;
            $record->baohieu = $baohieu;
            $record->thu1 = $thu1;
            $record->thu2 = $thu2;
            $record->thu3 = $thu3;
            $record->thu4 = $thu4;
            $record->thu5 = $thu5;
            $record->nat = $nat;
            $record->dtmf = $dtmf;
            $record->insecure = $insecure;
            $record->canreinvete = $canreinvete;
            $record->isagent = $isagent;
            $record->pickgroup = $pickgroup;
            $record->voicemail = $voicemail;
            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuThuebaoIp::create([
                'user_id' => $user_id,
                'sothuebao' => $sothuebao,
                'tenthuebao' => $tenthuebao,
                'matkhau' => $matkhau,
                'id_dialplan' => $id_dialplan,
                'baohieu' => $baohieu,
                'thu1' => $thu1,
                'thu2' => $thu2,
                'thu3' => $thu3,
                'thu4' => $thu4,
                'thu5' => $thu5,
                'nat' => $nat,
                'dtmf' => $dtmf,
                'insecure' => $insecure,
                'canreinvete' => $canreinvete,
                'isagent' => $isagent,
                'pickgroup' => $pickgroup,
                'voicemail' => $voicemail,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_thuebaoip($user_id, $delete_id){
        $record = IpuThuebaoIp::where([
            ['user_id', $user_id],
            ['id', $delete_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }

    private function insert_update_huonggoivao($user_id, $update_id, $trungke_id, $dausogoivao, $id_dialplan) {
        $message = "";

        $ar_trungke = explode("_", $trungke_id);
        $id_trungke = $ar_trungke[1];
        $loai_trungke = $ar_trungke[0];
        $id_trungke_e1 = 0;
        $id_trungke_ip = 0;
        $ten_trungke = "";
        if($loai_trungke == "E1") {
            $id_trungke_e1 = $id_trungke;
            $trungke = IpuTrungkeE1::find($id_trungke);
            if($trungke) {
                $ten_trungke = $trungke->tentrungke;
            }
        }else {
            $id_trungke_ip = $id_trungke;
            $trungke = IpuTrungkeIp::find($id_trungke);
            if($trungke) {
                $ten_trungke = $trungke->tentrungke;
            }
        }
        if($update_id > 0) { //Sửa
            $record = IpuHuonggoivao::where([
                ['user_id', $user_id],
                ['id', $update_id],
            ])->first();
            $record->id_trungke_e1 = $id_trungke_e1;
            $record->id_trungke_ip = $id_trungke_ip;
            $record->dausogoivao = $dausogoivao;
            $record->id_dialplan = $id_dialplan;
            $record->loai_trungke = $loai_trungke;
            $record->ten_trungke = $ten_trungke;
            $record->save();
            $message = "Cập nhật thành công";
        }else { //Thêm mới
            $result = IpuHuonggoivao::create([
                'user_id' => $user_id,
                'id_trungke_e1' => $id_trungke_e1,
                'id_trungke_ip' => $id_trungke_ip,
                'dausogoivao' => $dausogoivao,
                'id_dialplan' => $id_dialplan,
                'loai_trungke' => $loai_trungke,
                'ten_trungke' => $ten_trungke,
                'created_at' => now(),
            ]);
            $message = "Thêm mới thành công";
        }
        return $message;
    }

    function delete_huonggoivao($user_id, $delete_id){
        $record = IpuHuonggoivao::where([
            ['user_id', $user_id],
            ['id', $delete_id],
        ])->delete();
        $mesage = "Thực thi thành công, đã xóa bản ghi.";
        return $mesage;
    }


}
