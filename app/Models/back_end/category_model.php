<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_model extends Model
{
    protected $primaryKey = 'cat_id';
    protected $table = 'categories';
    use HasFactory;
}
