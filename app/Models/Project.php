<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'description', 'client_id', 'date_echeance'];

    protected $casts = [
        'date_echeance' => 'date',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
