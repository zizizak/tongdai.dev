<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrungkeCO extends Model
{
    protected $table = "trungke_co";
    protected $fillable = ['user_id', 'cauhinh_id', 'card', 'id_stt', 'loai', 'mo_khoa', 'tinhcuoc', 'kieu_goivao', 'created_at', 'updated_at'];
}
