<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'account_name',
        'account_number',
        'bank_name'
    ];
}
