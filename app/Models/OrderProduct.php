<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends BackendBaseModel
{
    protected $table = 'orders_products';
    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'total',
        'status',
        'created_by',
        'updated_by'];

        public function order(){
            return $this->belongsTo(Order::class,'order_id','id');
        }

}
