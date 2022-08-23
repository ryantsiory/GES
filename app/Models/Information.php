<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'adresse', 'telephone', 'date_de_naissance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
