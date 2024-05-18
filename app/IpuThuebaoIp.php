<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuThuebaoIp extends Model
{
    protected $table = "ipu_thuebao_ip";
    protected $fillable = ['user_id', 'sothuebao', 'tenthuebao', 'matkhau','id_dialplan', 'baohieu','thu1', 'thu2', 'thu3', 'thu4', 'thu5','nat', 'dtmf', 'insecure', 'canreinvete', 'isagent', 'pickgroup', 'voicemail', 'created_at', 'updated_at'];

    public function diaplan()
    {
        return $this->belongsTo(IpuDiaplan::class, 'id_dialplan');
    }

}
