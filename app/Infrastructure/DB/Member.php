<?php

namespace App\Infrastructure\DB;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'email', 'password'];
}