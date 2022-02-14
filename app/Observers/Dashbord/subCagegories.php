<?php

namespace App\Observers\Admin;

use App\Models\Dashbord\subcategories;

class subCagegories
{
    /**
     * Handle the subcategories "created" event.
     *
     * @param  \App\Models\Dashbord\subcategories  $subcategories
     * @return void
     */
    public function created(subcategories $subcategories)
    {
        //
    }

    /**
     * Handle the subcategories "updated" event.
     *
     * @param  \App\Models\Dashbord\subcategories  $subcategories
     * @return void
     */
    public function updated(subcategories $subcategories)
    {
        //
    }

    /**
     * Handle the subcategories "deleted" event.
     *
     * @param  \App\Models\Dashbord\subcategories  $subcategories
     * @return void
     */
    public function deleted(subcategories $subcategories)
    {
        //
    }

    /**
     * Handle the subcategories "restored" event.
     *
     * @param  \App\Models\Dashbord\subcategories  $subcategories
     * @return void
     */
    public function restored(subcategories $subcategories)
    {
        //
    }

    /**
     * Handle the subcategories "force deleted" event.
     *
     * @param  \App\Models\Dashbord\subcategories  $subcategories
     * @return void
     */
    public function forceDeleted(subcategories $subcategories)
    {
        //
    }
}
