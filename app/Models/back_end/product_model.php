<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    protected $primaryKey = 'product_id';
    protected $table = 'products';
    use HasFactory;
}
