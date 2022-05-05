<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable =['category_id','name','slug','image','rank','short_description','description','status','created_by','updated_by'];


    public function categoryId(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

}


