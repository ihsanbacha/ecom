<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon_model extends Model

{
    protected $primaryKey = 'coupon_id';
    protected $table = 'coupons';
    use HasFactory;
}
