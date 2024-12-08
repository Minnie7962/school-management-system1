<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $fillable = [
        'syllabus_id', 'subject', 'class', 'title', 'description', 'file', 'status'
    ];
}
