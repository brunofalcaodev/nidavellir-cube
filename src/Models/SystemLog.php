<?php

namespace Nidavellir\Cube\Models;

use Illuminate\Support\Str;
use Nidavellir\Abstracts\Classes\AbstractModel;

class SystemLog extends AbstractModel
{
    public static function setAggregateTag()
    {
        session(['nidavellir_cube_systemlog_tag' => Str::random(10)]);
    }

    public static function unsetAggregateTag()
    {
        session()->forget('nidavellir.cube.systemlog.tag');
    }
}
