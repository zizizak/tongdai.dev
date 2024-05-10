<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuTrungkeE1 extends Model
{
    protected $table = "ipu_trungke_e1";
    protected $fillable = ['user_id', 'tentrungke', 'id_luong', 'chieugoicackenh', 'baohieu', 'created_at', 'updated_at'];
}
