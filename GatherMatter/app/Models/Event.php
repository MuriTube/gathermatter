<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    //Tabellen Verknuepfung angeben
    protected $table = 'events';

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        //Hier tabellen Programmieren maxParticipants, location
    ];
}
