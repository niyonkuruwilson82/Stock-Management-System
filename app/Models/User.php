<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'UserId'; // use custom primary key

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'UserName', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
