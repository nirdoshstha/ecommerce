<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeDetails extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'product_attribute_details';
    protected $fillable = ['product_id','attribute_id','value'];
}
