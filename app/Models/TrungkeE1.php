<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrungkeE1 extends Model
{
    protected $table = "trungke_e1";
    protected $fillable = ['user_id', 'cauhinh_id', 'id_stt', 'vitri_batdau_goi_ra', 'vitri_batdau_goi_vao', 'clock', 'created_at', 'updated_at'];
}
