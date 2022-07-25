<?php

namespace App\Models;

use App\Models\Poste;
use App\Models\Conge;
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
        return $this->belongsTo(Conge::class);
    }
}
