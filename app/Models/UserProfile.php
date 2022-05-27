<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table ='users_profiles';
    protected $fillable = ['user_id','phone','address','dob','father_name','mother_name','facebook_link','insta_link','image','short_bio'];

    public function userProfile(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    use HasFactory;
}
