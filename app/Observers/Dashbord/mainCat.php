<?php

namespace App\Observers;

use App\Models\mainCategorie;

class mainCat
{
    /**
     * Handle the mainCategorie "created" event.
     *
     * @param  \App\Models\mainCategorie  $mainCategorie
     * @return void
     */
    public function created(mainCategorie $mainCategorie)
    {

    }

    /**
     * Handle the mainCategorie "updated" event.
     *
     * @param  \App\Models\models\mainCategorie  $mainCategorie
     * @return void
     */
    public function updated(mainCategorie $mainCategorie)
    {
        $mainCategorie->vendor()->update(['active' => $mainCategorie -> active]);
        $mainCategorie->subCat()->update(['active' => $mainCategorie -> active]);
    }

    /**
     * Handle the mainCategorie "deleted" event.
     *
     * @param  \App\Models\models\mainCategorie  $mainCategorie
     * @return void
     */
    public function deleted(mainCategorie $mainCategorie)
    {
        $mainCategorie->translationCat()->delete();
    }

    /**
     * Handle the mainCategorie "restored" event.
     *
     * @param  \App\Models\models\mainCategorie  $mainCategorie
     * @return void
     */
    public function restored(mainCategorie $mainCategorie)
    {
        //
    }

    /**
     * Handle the mainCategorie "force deleted" event.
     *
     * @param  \App\Models\models\mainCategorie  $mainCategorie
     * @return void
     */
    public function forceDeleted(mainCategorie $mainCategorie)
    {
        //
    }
}
