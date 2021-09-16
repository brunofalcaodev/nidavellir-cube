<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;


class Alert extends AbstractModel
{
    protected $casts = [
        'headers' => 'array',
        'body' => 'array',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
