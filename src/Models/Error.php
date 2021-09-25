<?php

namespace Nidavellir\Cube\Models;

use Nidavellir\Abstracts\Classes\AbstractModel;

class Error extends AbstractModel
{
    // The related model instance attached to the error.
    public function related()
    {
        return $this->morphTo(__FUNCTION__, 'errorable_type', 'errorable_id');
    }
}
