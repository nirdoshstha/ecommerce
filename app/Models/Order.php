<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends BackendBaseModel
{
    protected $table = 'orders';
    protected $fillable=[
        'user_id',
        'coupon_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'message',
        'shipping_charge',
        'sub_total',
        'total',
        'payment_mode',
        'payment_status',
        'status',
        'created_by',
        'updated_by'];

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function orderProduct(){
        return $this->hasMany(OrderProduct::class);
    }


}

