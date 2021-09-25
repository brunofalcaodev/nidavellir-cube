<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;

class Pair extends AbstractModel
{
    public function errors()
    {
        return $this->morphMany(Error::class, 'errorable');
    }

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
