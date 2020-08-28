<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'sender_id',
        'reciever_id',
        'status',
        'transaction_type',
        'amount',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'reciever_id');
    }
}
