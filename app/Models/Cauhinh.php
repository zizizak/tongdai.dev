<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cauhinh extends Model
{
    protected $table = "cauhinh";
    protected $fillable = ['user_id', 'stt', 'prefix', 'sobatdau', 'created_at', 'updated_at'];
}
