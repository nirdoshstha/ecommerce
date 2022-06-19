<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BackendBaseModel
{
    use HasFactory;
    protected $fillable =['category_id','subcategory_id','name','slug','code','short_description','description','price','quantity','stock','feature_key','flash_key','status','created_by','updated_by'];


    public function categoryId(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategoryId(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function attributeDetails(){
        return $this->belongsTo(ProductAttributeDetails::class);
    }

    public function productReviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function productReviewReplies(){
        return $this->hasMany(ProductReviewReply::class);
    }



}
