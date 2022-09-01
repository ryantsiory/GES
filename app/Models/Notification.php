<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notification';

    protected $fillable = ['user_id', 'subject', 'text', 'seen', 'object',  'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'deleted_at'    => 'datetime'
    ];

    //have users
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //have info
    public function info(){
        return $this->belongsTo(Information::class, 'user_id', 'user_id');
    }
}
