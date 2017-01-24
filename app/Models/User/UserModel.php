<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class UserModel extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    /**
     * Table name.
     *
     * @table string
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'email', 'password',
    ];


    /**
     * Get the user role that owns the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\UserRole\UserRoleModel', 'role_id', 'id');
    }


    /**
     * Check if user have role in given array or var
     *
     * @param array|string $roles
     *
     * @return boolean
     */
    public function hasRole($roles)
    {
        $cur_role = $this->role()->first()->name;
        if (is_array($roles) && in_array($cur_role, $roles))
        {
            return true;
        }
        if ($cur_role == $roles)
        {
            return true;
        }

        return false;

    }
}
