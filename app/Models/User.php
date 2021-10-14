<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function post(){

    return $this->hasOne('App\Models\Post');
}


public function posts(){

    return $this->hasMany('App\Models\Post');
}

 public function roles(){

    return $this->belongsToMany('App\Models\Role')->withPivot('created_at');

//     // return $this->belongsToMany('App\Models\Role','user_roles','user_id','role_id');

//     //To customize table name and columns follow the format below

 }

 public function photos(){

    return $this->morphMany('App\Models\Photo','imageable');

}

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
