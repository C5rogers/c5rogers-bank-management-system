<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class withdraw extends Model
{
    use HasFactory;
    protected $table='withdraws';
    protected $fillable=[
        'user_id',
        'ammount',
        'token'
    ];


    // belongs to relation to the user
    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
