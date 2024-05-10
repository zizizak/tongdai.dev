<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuTrungkeIp extends Model
{
    protected $table = "ipu_trungke_ip";
    protected $fillable = ['user_id', 'tentrungke', 'diachiketnoi', 'taikhoan', 'matkhau', 'chuanbaohieu','thu1','thu2','thu3','thu4','thu5','outboundproxy', 'created_at', 'updated_at'];
}
