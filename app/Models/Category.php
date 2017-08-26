<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends CommonModel
{
    //
    protected $fillable = ['pid', 'name', 'title', 'description', 'keyword', 'front_show', 'sort', 'status'];

    public function scopeStatusEq1($query)
    {
        return $query->where('status', 1);
    }
    public function article()
    {
        return $this->hasMany('App\Models\Article','cid');
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
