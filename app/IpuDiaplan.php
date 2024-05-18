<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IpuDiaplan extends Model
{
    protected $table = "ipu_diaplan";
    protected $fillable = ['user_id', 'tendialplan', 'goinoidai', 'goihangdoi', 'goihoinghi','id_huonggoira', 'ten_huonggoira', 'created_at', 'updated_at'];
}
