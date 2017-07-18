<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends CommonModel
{
    //
    protected $fillable = ['name', 'title', 'type', 'value', 'content', 'description', 'sort', 'status'];

    public function scopeStatusEq1($query)
    {
        return $query->where('status', 1);
    }

//    public static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope('status', function(Builder $builder) {
//            $builder->where('status', '=', 1);
//        });
//    }
}
