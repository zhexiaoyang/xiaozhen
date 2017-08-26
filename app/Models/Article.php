<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends CommonModel
{
    //
    protected $fillable = ['cid', 'tag', 'title', 'description', 'thumb', 'content', 'editor', 'view', 'sort', 'status','img_url','img_name','is_rec'];

    public function scopeStatusEq1($query)
    {
        return $query->where('status', 1);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cid');
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
