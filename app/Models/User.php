<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
         'name', 'email', 'no_hp', 'wa', 'pin', 'password', 'is_admin', 'foto', 'create_by', 'create_date', 'update_by', 'update_date', 'status_user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFotoUrlAttribute()
    {
        // Check if user has a foto set
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        } else {
            return asset('assets/media/avatars/blank.png');
        }
    }
}
