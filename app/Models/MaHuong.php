<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaHuong extends Model
{
    protected $table = "mahuong";
    protected $fillable = ['user_id', 'cauhinh_id', 'mahuong_id', 'mahuong_dinhtuyen', 'sochan', 'min_soquay', 'huong_id', 'tongso_chuso_mahuong', 'created_at', 'updated_at'];
}
