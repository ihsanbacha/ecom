<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size_model extends Model
{
    protected $primaryKey = 'size_id';
    protected $table = 'sizes';
    use HasFactory;
}
