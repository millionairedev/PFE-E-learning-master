<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'adress', 'cni', 'cne','email','usertype', 'filiere','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $table='users';

    public function getRouteKeyName(){
        return 'name';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }


    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }


      public function cours()
    {
        return $this->hasMany(Cours::class);
    }

       public function notes()
    {
        return $this->hasMany(Note::class);
    }

     public function emplois()
    {
      return $this->hasMany(Emploi::class);
    }

    public function tafs()
    {
        return $this->hasMany(Taf::class);
    }

    public function tds()
    {
        return $this->hasMany(Td::class);
    }
}


