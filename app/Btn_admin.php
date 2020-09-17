<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Btn_admin extends Model implements Authenticatable
{
    //
    protected $table = 'btn_admin';
     use AuthenticableTrait;
}
