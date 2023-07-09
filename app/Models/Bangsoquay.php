<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bangsoquay extends Model
{
    protected $table = "bangsoquay";
    protected $fillable = ['user_id', 'cauhinh_id', 'dauso', 'so_digits', 'created_at', 'updated_at'];
}
