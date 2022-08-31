<?php

namespace App\Models;

use App\Models\Project;
use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status','completed','project_id', 'user_id', 'description', 'date_start', 'date_end'];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'updated_at' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
