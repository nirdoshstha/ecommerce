<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends BackendBaseModel
{
    protected $fillable=['title', 'code', 'start_date', 'expire_date','discount_amount','status','created_by','updated_by'];

}
