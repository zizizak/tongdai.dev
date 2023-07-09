<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TongdaiClass extends Model
{
    protected $table = "Tongdai_Class";
    protected $fillable = ['user_id', 'cauhinh_id', 'class_id', 'digits', 'quyen', 'created_at', 'updated_at'];
}
