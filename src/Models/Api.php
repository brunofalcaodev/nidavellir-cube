<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;
use Nidavellir\Cube\Models\Order;

class Api extends AbstractModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}