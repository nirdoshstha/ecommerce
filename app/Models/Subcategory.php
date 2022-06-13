<?php

namespace App\Models;

use App\Http\Traits\FilterDataTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends BackendBaseModel
{
    use HasFactory;
    // use FilterDataTrait;

    protected $fillable =['category_id','name','slug','image','rank','short_description','description','status','created_by','updated_by'];


    public function products(){
        return $this->hasMany(Product::class);
    }
    public function categoryId(){
        return $this->belongsTo(Category::class, 'category_id');
    }


}


