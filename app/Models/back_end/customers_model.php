<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers_model extends Model
{
    
    protected $primaryKey = 'customer_id';
    protected $table = 'customers';
    use HasFactory;
}
