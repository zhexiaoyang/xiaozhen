<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Say extends CommonModel
{
    //
    protected $fillable = ['title', 'content', 'sort', 'status','img_url','img_name','is_rec'];

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
