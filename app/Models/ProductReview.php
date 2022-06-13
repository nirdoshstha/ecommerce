<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends BackendBaseModel
{
    use SoftDeletes;
    protected $fillable=['product_id', 'user_id', 'comment'];


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function productReviewReplies(){
        return $this->hasMany(ProductReviewReply::class);
    }

}
