<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PasswordReset extends Model
{
 
public function user()
{
    return $this->belongsTo(User::class, 'email', 'email');
}
    protected $table = 'password_resets';
    
    protected $fillable = [
        'email', 'token', 'created_at'
    ];
}
