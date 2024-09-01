<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referred_user_email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
