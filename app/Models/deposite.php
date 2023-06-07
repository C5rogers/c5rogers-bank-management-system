<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class deposite extends Model
{
    use HasFactory;
    protected $table='deposites';
    protected $fillable=[
        'user_id',
        'ammount'
    ];

    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
