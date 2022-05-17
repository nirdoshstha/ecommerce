<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'address',
        'email',
        'phone',
        'website',
        'pan_no',
        'logo',
        'fav_icon',
        'facebook_link',
        'twitter_link',
        'youtube_link',
        'instagram_link',
        'google_map',
        'status',
        // 'created_by',
    ];
}
