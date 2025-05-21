<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'reference',
        'expires_at',
        'expired_processed',   // ← nuevo
    ];

    protected $casts = [
        'expires_at'        => 'datetime',
        'expired_processed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
