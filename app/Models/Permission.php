<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
    protected $fillable = ['pid', 'name', 'display_name', 'description', 'icon', 'is_menu', 'sort', 'status'];

    public function scopeStatus1($query)
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
