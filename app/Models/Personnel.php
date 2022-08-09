<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\Conge;
use App\Models\Information;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'poste_id'];


    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function conge()
    {
        return $this->hasMany(Conge::class);
    }

    public function info(){
        return $this->hasOne(Information::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->hasMany(Project::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
