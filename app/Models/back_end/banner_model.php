<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner_model extends Model
{
    protected $primaryKey = 'banner_id';
    protected $table = 'home_banner';
    use HasFactory;
}
