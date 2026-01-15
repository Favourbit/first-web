<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 
        'description', 
        'amount', 
        'type', 
        'category', 
        'item_id', 
        'transaction_time'
    ];

    protected $casts = [
        'transaction_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}