<?php

namespace Nidavellir\Cube\Observers;

use Nidavellir\Cube\Models\SystemLog;

class SystemLogObserver
{
    /**
     * Handle the SystemLog "created" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function saving(SystemLog $systemLog)
    {
        if (!is_blank(session('nidavellir_cube_systemlog_tag'))) {
            $aggregate = session('nidavellir_cube_systemlog_tag');
            $systemLog->aggregatable_hashcode = $aggregate;
            $systemLog->aggregatable_step = SystemLog::where('aggregatable_hashcode', $aggregate)->get()->count()+1;
        }
    }

    /**
     * Handle the SystemLog "created" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function created(SystemLog $systemLog)
    {
        //
    }

    /**
     * Handle the SystemLog "updated" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function updated(SystemLog $systemLog)
    {
        //
    }

    /**
     * Handle the SystemLog "deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function deleted(SystemLog $systemLog)
    {
        //
    }

    /**
     * Handle the SystemLog "restored" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function restored(SystemLog $systemLog)
    {
        //
    }

    /**
     * Handle the SystemLog "force deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\SystemLog  $systemLog
     * @return void
     */
    public function forceDeleted(SystemLog $systemLog)
    {
        //
    }
}
