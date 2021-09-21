<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;

class Pair extends AbstractModel
{
    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
