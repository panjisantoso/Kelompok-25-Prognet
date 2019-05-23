<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';
    protected $fillable = [
        'username','profil_image','phone','name', 'password', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function notifications()
    {
        return $this->morphMany(DatabaseAdminNotif::class, 'notifiable')->orderBy('created_at', 'desc');
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
   
}
