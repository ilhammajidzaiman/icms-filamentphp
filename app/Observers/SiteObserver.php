<?php

namespace App\Observers;

use App\Models\Site;
use Illuminate\Support\Facades\Storage;

class SiteObserver
{
    /**
     * Handle the Site "created" event.
     */
    public function created(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "updated" event.
     */
    public function updated(Site $site): void
    {
        if ($site->isDirty('favicon')) :
            if ($site->getOriginal('favicon')) :
                Storage::disk('public')->delete($site->getOriginal('favicon'));
            endif;
        endif;

        if ($site->isDirty('logo')) :
            if ($site->getOriginal('logo')) :
                Storage::disk('public')->delete($site->getOriginal('logo'));
            endif;
        endif;
    }

    /**
     * Handle the Site "deleted" event.
     */
    public function deleted(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "restored" event.
     */
    public function restored(Site $site): void
    {
        //
    }

    /**
     * Handle the Site "force deleted" event.
     */
    public function forceDeleted(Site $site): void
    {
        //
    }
}
