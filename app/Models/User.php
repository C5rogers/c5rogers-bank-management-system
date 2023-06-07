<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\deposite;
use App\Models\transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'accountNumber',
        'name',
        'email',
        'password',
        'profile',
        'balance',
        'status',
        'sex',
        'phoneNumber',
        'location',
        'auth'
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


    // has many relation with withdraw
    public function withdraw():HasMany{
        return $this->hasMany(withdraw::class,'user_id');
    }

    // has many relation with transaction
    public function transaction():HasMany{
        return $this->hasMany(transaction::class,'user_id');
    }

    // this is a has many relation with deposite
    public function deposites():HasMany{
        return $this->hasMany(deposite::class,'user_id');
    }
}
