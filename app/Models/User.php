<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 's_no';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'email', 'password_hash', 'role', 'theme'
    ];

    protected $hidden = [
        'password_hash', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}