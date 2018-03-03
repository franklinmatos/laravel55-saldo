<?php

namespace App;

use App\Models\Historic;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\balance;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function balance(){
        return $this->hasOne(Balance::class);
    }


    public function historics(){
        return $this->hasMany(Historic::class);
    }

    public function getEmail($semail)
    {
       return  $this->where('email', $semail)
            ->get()
            ->first();
    }
}
