<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $fillable = [
        'username','profil_image','phone','name', 'password', 'email',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    public function notifications()
    {
        return $this->morphMany(DatabaseAdminNotif::class, 'notifiable')->orderBy('created_at', 'desc');
    }


}
