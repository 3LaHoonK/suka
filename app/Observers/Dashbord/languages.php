<?php

namespace App\Observers\Dashbord;

use App\Models\Dashbord\language;

class languages
{
    /**
     * Handle the language "created" event.
     *
     * @param  \App\Models\Dashbord\language  $language
     * @return void
     */
    public function created(language $language)
    {
        //
    }

    /**
     * Handle the language "updated" event.
     *
     * @param  \App\Models\Dashbord\language  $language
     * @return void
     */
    public function updated(language $language)
    {
        $language->mainCategorie()->update(['active' => $language -> active]);
    }

    /**
     * Handle the language "deleted" event.
     *
     * @param  \App\Models\Dashbord\language  $language
     * @return void
     */
    public function deleted(language $language)
    {
        //
    }

    /**
     * Handle the language "restored" event.
     *
     * @param  \App\Models\Dashbord\language  $language
     * @return void
     */
    public function restored(language $language)
    {
        //
    }

    /**
     * Handle the language "force deleted" event.
     *
     * @param  \App\Models\Dashbord\language  $language
     * @return void
     */
    public function forceDeleted(language $language)
    {
        //
    }
}
