<?php

namespace App\Models\UserRole;

use Illuminate\Database\Eloquent\Model;

class UserRoleModel extends Model
{

    /**
     * Table name.
     *
     * @table string
     */
    protected $table = "user_roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [ 'name' ];
	
}
