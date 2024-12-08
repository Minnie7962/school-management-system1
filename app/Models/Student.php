<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id', 'first_name', 'last_name', 'class', 'section', 'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function guardian()
    {
        return $this->hasOne(StudentGuardian::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }

    public function feeRecords()
    {
        return $this->hasMany(FeeRecord::class);
    }
}
