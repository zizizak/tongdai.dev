<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuHuonggoivao extends Model
{
    protected $table = "ipu_huonggoivao";
    protected $fillable = ['user_id', 'id_trungke_e1', 'id_trungke_ip', 'dausogoivao', 'id_dialplan', 'loai_trungke','ten_trungke', 'created_at', 'updated_at'];

    public function diaplan()
    {
        return $this->belongsTo(IpuDiaplan::class, 'id_dialplan');
    }
}
