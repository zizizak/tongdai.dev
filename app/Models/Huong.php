<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huong extends Model
{
    protected $table = "huong";
    protected $fillable = ['user_id', 'cauhinh_id', 'huong_id', 'loai', 'thanhphan', 'loai_thanhphan', 'created_at', 'updated_at'];
}
