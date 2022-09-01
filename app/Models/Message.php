<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = ['from', 'to', 'message', 'is_read', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

