<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thuebao extends Model
{
    protected $table = "thuebao";
    protected $fillable = ['user_id', 'cauhinh_id', 'thuebao_id', 'socuoi', 'class_id', 'class_id', 'card', 'quyen', 'uutien', 'loai', 'mota', 'created_at', 'updated_at'];
}
