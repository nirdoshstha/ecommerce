<?php

namespace App\Models;

use App\Http\Traits\FilterDataTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BackendBaseModel
{
    use HasFactory;
    // use FilterDataTrait;
    // protected $table = 'categories';
    protected $fillable = ['name','slug','image','rank','short_description','description','status','created_by','updated_by'];


    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }
}




