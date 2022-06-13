<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends BackendBaseModel
{
    protected $table ='users_profiles';
    protected $fillable = ['user_id','phone','address','dob','father_name','mother_name','facebook_link','insta_link','image','short_bio'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    use HasFactory;
}
