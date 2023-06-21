<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taxs_model extends Model
{
    protected $primaryKey = 'taxs_id';
    protected $table = 'taxs';
    use HasFactory;
}
