<?php

namespace App\Models;


use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = ['nom', 'description', 'adresse', 'telephone'];

    //protected $guarded = [];


    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }


}
