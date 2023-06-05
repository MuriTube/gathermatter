<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Event extends Model
{   
    //Tabellen Verknuepfung angeben
    protected $table = 'events';

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'organizerID',
        //Hier tabellen Programmieren maxParticipants, location
    ];
     // Beziehung zum User Modell
     public function organizer()
     {
         return $this->belongsTo(User::class, 'organizerID');
     }
     public function tickets()
     {
         return $this->hasMany(Ticket::class, 'eventID');
     }
     

     
}
