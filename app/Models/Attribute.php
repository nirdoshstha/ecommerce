<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends BackendBaseModel
{
    use SoftDeletes;
    protected $fillable=['name', 'status', 'created_by', 'updated_by'];


}
