<?php

namespace Nidavellir\Cube\Observers;

use Nidavellir\Cube\Models\Error;

class ErrorObserver
{
    /**
     * Handle the Error "created" event.
     *
     * @param  \Nidavellir\Cube\Models\Error  $error
     * @return void
     */
    public function created(Error $error)
    {
        //
    }

    /**
     * Handle the Error "updated" event.
     *
     * @param  \Nidavellir\Cube\Models\Error  $error
     * @return void
     */
    public function updated(Error $error)
    {
        //
    }

    /**
     * Handle the Error "deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Error  $error
     * @return void
     */
    public function deleted(Error $error)
    {
        //
    }

    /**
     * Handle the Error "restored" event.
     *
     * @param  \Nidavellir\Cube\Models\Error  $error
     * @return void
     */
    public function restored(Error $error)
    {
        //
    }

    /**
     * Handle the Error "force deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Error  $error
     * @return void
     */
    public function forceDeleted(Error $error)
    {
        //
    }
}
