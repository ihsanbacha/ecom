<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colour_model extends Model
{
    protected $primaryKey = 'colour_id';
    protected $table = 'colours';
    use HasFactory;
}
