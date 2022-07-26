<?php

namespace App\Models;

use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Information extends Model
{
    use HasFactory;

    protected $fillable = ['personnel_id', 'adresse', 'telephone', 'date_de_naissance'];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
