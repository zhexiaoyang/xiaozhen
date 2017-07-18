<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description', 'sort', 'status'];
    public function scopeStatusEq1($query)
    {
        return $query->where('status', 1);
    }
}
