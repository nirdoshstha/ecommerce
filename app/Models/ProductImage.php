<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BackendBaseModel
{
    protected $fillable =['product_id','name','image'];
    // use HasFactory;

    public function productImage(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
