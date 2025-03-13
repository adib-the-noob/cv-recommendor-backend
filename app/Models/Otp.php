<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    public $fillable = [
        'user_id',
        'code',
        'has_used',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
