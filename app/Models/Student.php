<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 's_no';
    
    protected $fillable = [
        'id', 'first_name', 'last_name', 'father_name', 
        'gender', 'class', 'section', 'date_of_birth', 
        'profile_image', 'phone', 'email', 'address', 
        'city', 'zip_code', 'state', 'user_id', 
        'admission_status', 'admission_date'
    ];

    protected $dates = ['date_of_birth', 'admission_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 's_no');
    }

    public function guardian()
    {
        return $this->hasOne(StudentGuardian::class, 'id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'id');
    }
}
