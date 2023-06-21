<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand_model extends Model
{
    protected $primaryKey = 'brand_id';
    protected $table = 'brands';
    use HasFactory;
}
