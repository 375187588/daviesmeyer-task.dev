<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{

    /**
     * Table name.
     *
     * @table string
     */
    protected $table = "mails";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'email', 'phone', 'address', 'message' ];

}
