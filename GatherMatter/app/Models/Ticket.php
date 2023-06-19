<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    use HasFactory;

    protected $fillable = [
        'eventID',
        'price',
        'tier',
        'description'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'eventID');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'ticketID');
    }

}
