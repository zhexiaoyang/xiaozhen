<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends CommonModel
{
    //
    protected $fillable = ['title', 'pid', 'sort', 'status','name','url'];

    public function scopeStatusEq1($query)
    {
        return $query->where('status', 1);
    }
}
