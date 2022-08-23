<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Poste;
use App\Models\Task;
use App\Models\Project;
use App\Models\Conge;
use App\Models\Information;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'avatar',
        'poste_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



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

    public function project(){
        return $this->hasMany(Project::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
