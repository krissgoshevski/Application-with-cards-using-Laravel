<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];


    public function role()
    {
        // i use belongsTo, because i check if this user have some role
        return $this->belongsTo(Role::class);
        // bidejki vo users tabelata se naoga role_id poleto odnosno FK sekogas vo koja tabela se naoga FK vo taa tabela se stava belongTO !!!!

    }


    public function hasRole($role)
    {
         return $this->role->name === $role;
         // probuvam preku ovaa relacija role da go zemam imeto na role i dali e ednakvo so toa ime sto ke se logira odnosno vnese 

    }
}
