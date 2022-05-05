<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // protected $table = 'categories';
    protected $fillable = ['name','slug','image','rank','short_description','description','status','created_by','updated_by'];


    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }
}




