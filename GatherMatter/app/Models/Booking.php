<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;

class Booking extends Model
{
    protected $table = 'booking';
    
    use HasFactory;
    
    protected $fillable = [
        'userID',
        'ticketID',
        'date',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'eventID');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticketID');
    }
}
