<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;

class Token extends AbstractModel
{
    public function errors()
    {
        return $this->morphMany(Error::class, 'errorable');
    }

    public function pairs()
    {
        return $this->hasMany(Pair::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
