<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'sender_id', 'editor_id', 'title', 'body', 'file', 'role', 'class'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
