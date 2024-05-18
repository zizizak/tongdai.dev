<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuHuonggoira extends Model
{
    protected $table = "ipu_huonggoira";
    protected $fillable = ['user_id', 'tenhuonggoira', 'dausoquay', 'sochugoi', 'digitchenvao','digitbichan', 'tentrungke', 'id_trungke_e1', 'id_trungke_ip', 'loai_trungke', 'created_at', 'updated_at'];
}
