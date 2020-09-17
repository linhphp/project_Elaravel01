<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class User extends Model implements Authenticatable
{
    //
    protected $table = 'users';
    use AuthenticableTrait;
}
