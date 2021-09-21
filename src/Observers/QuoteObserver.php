<?php

namespace Nidavellir\Cube\Observers;

use Nidavellir\Cube\Models\Pair;

class PairObserver
{
    /**
     * Handle the Pair "created" event.
     *
     * @param  \Nidavellir\Cube\Models\Pair  $pair
     * @return void
     */
    public function created(Pair $pair)
    {
        //
    }

    /**
     * Handle the Pair "updated" event.
     *
     * @param  \Nidavellir\Cube\Models\Pair  $pair
     * @return void
     */
    public function updated(Pair $pair)
    {
        //
    }

    /**
     * Handle the Pair "deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Pair  $pair
     * @return void
     */
    public function deleted(Pair $pair)
    {
        //
    }

    /**
     * Handle the Pair "restored" event.
     *
     * @param  \Nidavellir\Cube\Models\Pair  $pair
     * @return void
     */
    public function restored(Pair $pair)
    {
        //
    }

    /**
     * Handle the Pair "force deleted" event.
     *
     * @param  \Nidavellir\Cube\Models\Pair  $pair
     * @return void
     */
    public function forceDeleted(Pair $pair)
    {
        //
    }
}
