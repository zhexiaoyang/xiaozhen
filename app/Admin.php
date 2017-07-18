<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, EntrustUserTrait{
        EntrustUserTrait::can as may;
        Authorizable::can insteadof EntrustUserTrait;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('status', function(Builder $builder) {
            $builder->where('status', '=', 1);
        });
    }

    public function create_user(Request $request)
    {
        $userData = $request->all();
        //密码进行加密
        $userData['password'] = bcrypt($userData['password']);

        if ($this->fill($userData)->save()) {
            return true;
        }
        return false;
    }

    public function update_user(Request $request)
    {
        $userData = $request->all();
        $id = intval($userData['id']);
        if ($id)
        {
            $userData = $this->fill($userData);
            $userData = $userData->toArray();
            if ($this->withoutGlobalScope('status')->where('id','=',$id)->update($userData)) {
                return true;
            }else{
//                返回错误信息
            }
        }else{
//            返回错误信息
        }
        return false;
    }
}
