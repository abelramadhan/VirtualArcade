<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthAuthenticatable;

    public $incrementing = False;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $primaryKey = 'username';
}
