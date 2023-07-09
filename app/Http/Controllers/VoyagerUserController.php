<?php

namespace App\Http\Controllers;

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

class VoyagerUserController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function profile(Request $request)
    {
        $route = '';
        $dataType = Voyager::model('DataType')->where('model_name', Auth::guard(app('VoyagerGuard'))->getProvider()->getModel())->first();
        if (!$dataType && app('VoyagerGuard') == 'web') {
            $route = route('voyager.users.edit', Auth::user()->getKey());
        } elseif ($dataType) {
            $route = route('voyager.'.$dataType->slug.'.edit', Auth::user()->getKey());
        }

        return Voyager::view('voyager::profile', compact('route'));
    }


    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (Auth::user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => Auth::user()->role_id,
                'user_belongstomany_role_relationship' => Auth::user()->roles->pluck('id')->toArray(),
            ]);
        }

        return parent::update($request, $id);
    }


    public function init_data(Request $request, $id)
    {
        $this->_taoDulieuMau($id);
        $slug = $this->getSlug($request);
        $redirect = redirect()->route("voyager." . $slug . ".index");
        return $redirect->with([
            'message'    => 'Tạo dữ liệu thành công user_id: ' . $id . '!',
            'alert-type' => 'success',
        ]);
    }

    //Khi gọi hàm sẽ xóa các dữ liệu cũ và insert toàn bộ dữ liệu mẫu mới
    private function _taoDulieuMau($user_id) {
        //1. Cấu hình - cauhinh
        $deleted = Cauhinh::where('user_id', $user_id)->delete();
        $arCauhinh = [0, 1, 2];
        foreach($arCauhinh as $item) {
            Cauhinh::create([
                'user_id' => $user_id,
                'stt' => $item,
                'created_at' => now()
            ]);
        }
        //2. Bảng số quay - bangsoquay
        $this->resetBangSoQuay($user_id, $arCauhinh);

        //3. Trung kế CO - trungkeCO
        $this->resetTrungkeCO($user_id, $arCauhinh);

        //4. Trung kế E1 - trungkeE1
        $this->resetTrungkeE1($user_id, $arCauhinh);

        //5. Hướng - huong
        $this->resetHuong($user_id, $arCauhinh);

        //6. Mã hướng - mahuong
        $this->resetMaHuong($user_id, $arCauhinh);

        //7. Class - tongdai_class
        $this->resetClass($user_id, $arCauhinh);

        //8. Thuê bao - thuebao
        $this->resetThuebao($user_id, $arCauhinh);


    }

    private function resetBangSoQuay($user_id, $arCauhinh){
        $arBangsoquay = [
            [
                'dauso' => '009',
                'so_digits' => 11,
            ],
            [
                'dauso' => '000',
                'so_digits' => 16,
            ],
            [
                'dauso' => '00',
                'so_digits' => 9,
            ],
            [
                'dauso' => '0',
                'so_digits' => 7,
            ],
        ];

        $deleted = Bangsoquay::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            foreach($arBangsoquay as $item) {
                Bangsoquay::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'dauso' => $item['dauso'],
                    'so_digits' => $item['so_digits'],
                    'created_at' => now()
                ]);
            }
        }
    }

    private function resetTrungkeCO($user_id, $arCauhinh){
        $deleted = TrungkeCO::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            for($i = 1; $i <= 8; $i++) {
                TrungkeCO::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'card' => 10,
                    'id_stt' => $i,
                    'loai' => 1,
                    'mo_khoa' => 1,
                    'tinhcuoc' => 1,
                    'kieu_goivao' => 1,
                    'created_at' => now()
                ]);
            }
        }
    }

    private function resetTrungkeE1($user_id, $arCauhinh){
        $deleted = TrungkeE1::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            for($i = 1; $i <= 4; $i++) {
                TrungkeE1::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'id_stt' => $i,
                    'vitri_batdau_goi_ra' => 1,
                    'vitri_batdau_goi_vao' => 16,
                    'clock' => 1,
                    'created_at' => now()
                ]);
            }
        }
    }

    private function resetHuong($user_id, $arCauhinh){
        $arData = [
            [
                'huong_id' => '0',
                'loai' => 1,
                'thanhphan' => '1',
            ],
            [
                'huong_id' => '1',
                'loai' => 2,
                'thanhphan' => '1,2',
            ],
            [
                'huong_id' => '2',
                'loai' => 3,
                'thanhphan' => '2',
            ],
            [
                'huong_id' => '3',
                'loai' => 4,
                'thanhphan' => '2',
            ],
        ];

        $deleted = Huong::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            foreach($arData as $item) {
                Huong::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'huong_id' => $item['huong_id'],
                    'loai' => $item['loai'],
                    'thanhphan' => $item['thanhphan'],
                    'created_at' => now()
                ]);
            }
        }
    }

    private function resetMaHuong($user_id, $arCauhinh) {
        $arData = [
            [
                'mahuong_id' => '0',
                'mahuong_dinhtuyen' => '00',
                'min_soquay' => 1,
                'huong_id' => 0,
                'tongso_chuso_mahuong' => 1,
                'sochan' => 1,
            ],
            [
                'mahuong_id' => '1',
                'mahuong_dinhtuyen' => '01',
                'min_soquay' => 1,
                'huong_id' => 1,
                'tongso_chuso_mahuong' => 1,
                'sochan' => 1,
            ],
            [
                'mahuong_id' => '2',
                'mahuong_dinhtuyen' => '02',
                'min_soquay' => 1,
                'huong_id' => 0,
                'tongso_chuso_mahuong' => 1,
                'sochan' => 1,
            ],
            [
                'mahuong_id' => '3',
                'mahuong_dinhtuyen' => '03',
                'min_soquay' => 1,
                'huong_id' => 2,
                'tongso_chuso_mahuong' => 1,
                'sochan' => 1,
            ],
            [
                'mahuong_id' => '4',
                'mahuong_dinhtuyen' => '04',
                'min_soquay' => 1,
                'huong_id' => 2,
                'tongso_chuso_mahuong' => 1,
                'sochan' => 1,
            ],
        ];

        $deleted = MaHuong::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            foreach($arData as $item) {
                Huong::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
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

    private function resetClass($user_id, $arCauhinh){
        $arData = [
            [
                'class_id' => '1',
                'digits' => 1,
                'quyen' => '1',
            ],
            [
                'class_id' => '2',
                'digits' => 1,
                'quyen' => '1',
            ],
            [
                'class_id' => '3',
                'digits' => 1,
                'quyen' => '1',
            ],
            [
                'class_id' => '4',
                'digits' => 1,
                'quyen' => '1',
            ],
            [
                'class_id' => '5',
                'digits' => 1,
                'quyen' => '1',
            ],
        ];

        $deleted = TongdaiClass::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            foreach($arData as $item) {
                TongdaiClass::create([
                    'user_id' => $user_id,
                    'cauhinh_id' => $cauhinh_id,
                    'class_id' => $item['class_id'],
                    'digits' => $item['digits'],
                    'quyen' => $item['quyen'],
                    'created_at' => now()
                ]);
            }
        }
    }

    private function resetThuebao($user_id, $arCauhinh){
        $deleted = Thuebao::where('user_id', $user_id)->delete();
        foreach($arCauhinh as $cauhinh_id) {
            $prefix = 659;
            $socuoi = 100;
            $stt= 1;
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
        }
    }


}
