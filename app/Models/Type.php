<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    /* 
        Definisco la relazione 1 a *
    */
    public function projects()
    {
        return $this->hasMany(Project::class); //Tabella indipendente (1)
    }
}
