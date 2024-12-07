<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 's_no';
    
    protected $fillable = [
        'id', 'first_name', 'last_name', 'date_of_birth', 
        'profile_image', 'phone', 'gender', 'address', 'user_id'
    ];

    protected $dates = ['date_of_birth'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 's_no');
    }

    // Accessor and Mutator Examples
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }
}
