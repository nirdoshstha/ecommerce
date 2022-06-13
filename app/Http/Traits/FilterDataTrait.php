<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

trait FilterDataTrait
{
    protected static function booted()
    {
        static::addGlobalScope('FilterById', function (Builder $builder) {
            $builder->where('id', '>=', 5);
        });
    }
}
