<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthCustom;

class Admin extends AuthCustom
{

    protected $fillable = [
        'username',
        'password',
    ];

   
}