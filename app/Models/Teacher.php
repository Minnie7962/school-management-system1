<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_id', 'first_name', 'last_name', 'subject', 'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function guardian()
    {
        return $this->hasOne(TeacherGuardian::class);
    }

    public function timeTables()
    {
        return $this->hasMany(TimeTable::class, 'teacher_id', 'teacher_id');
    }
}
