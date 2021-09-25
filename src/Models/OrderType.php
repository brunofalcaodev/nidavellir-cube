<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;

class OrderType extends AbstractModel
{
    public function errors()
    {
        return $this->morphMany(Error::class, 'errorable');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
