<?php

namespace Nidavellir\Cube\Observers;

use Nidavellir\Cube\Models\Ticker;

class TickerObserver
{
    /**
     * Handle the Ticker "saving" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function saving(Ticker $ticker)
    {
        $ticker->canonical = strtoupper($ticker->canonical);
    }

    /**
     * Handle the Ticker "created" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function created(Ticker $ticker)
    {
        //
    }

    /**
     * Handle the Ticker "updated" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function updated(Ticker $ticker)
    {
        //
    }

    /**
     * Handle the Ticker "deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function deleted(Ticker $ticker)
    {
        //
    }

    /**
     * Handle the Ticker "restored" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function restored(Ticker $ticker)
    {
        //
    }

    /**
     * Handle the Ticker "force deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Ticker  $ticker
     * @return void
     */
    public function forceDeleted(Ticker $ticker)
    {
        //
    }
}
