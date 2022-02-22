<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Events\UserCreated;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // i ADDED using event to for model lifcycle -> way 1
    protected $dispatchesEvents = [
        'creating' => UserCreated::class
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sub'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //i ADDED using boot method to for model lifcycle -> way 2
    public static function boot()
    {
        parent::boot();

        static::updated(function($user) {
            dd('From boot method',$user);
        });
    }
}
