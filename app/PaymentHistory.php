<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
	protected $primaryKey = 'id';
    protected $table = 'payment_history';

    protected $fillable = [
        'user_id','amount', 'stripe_token', 'description', 'currency',

    ];
}
