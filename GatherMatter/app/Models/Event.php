<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{   
    // Tabellenverknüpfung angeben
    protected $table = 'events';

    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'date',
        'organizerID',
        'image_path', // Hinzufügen des 'image_path' Feldes zu den fillable-Feldern
        // Hier Tabellen programmieren: maxParticipants, location
    ];

    // Beziehung zum User-Modell
    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizerID');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'eventID');
    }     
}
