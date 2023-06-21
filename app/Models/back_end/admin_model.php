<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'users';
    use HasFactory;
}
