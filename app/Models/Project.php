<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'type_id',
    ];

    /* 
        Definisco la relazione 1 a *
    */

    public function type()
    {
        return $this->belongsTo(Type::class); //Tabella dipendente (*)
    }
}
