<?php

namespace App\Observers;

use App\Models\Media\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselObserver
{
    /**
     * Handle the Carousel "created" event.
     */
    public function created(Carousel $carousel): void
    {
        //
    }

    /**
     * Handle the Carousel "updated" event.
     */
    public function updated(Carousel $carousel): void
    {
        if ($carousel->isDirty('file')) :
            if ($carousel->getOriginal('file')) :
                Storage::disk('public')->delete($carousel->getOriginal('file'));
            endif;
        endif;
    }

    /**
     * Handle the Carousel "deleted" event.
     */
    public function deleted(Carousel $carousel): void
    {
        //
    }

    /**
     * Handle the Carousel "restored" event.
     */
    public function restored(Carousel $carousel): void
    {
        //
    }

    /**
     * Handle the Carousel "force deleted" event.
     */
    public function forceDeleted(Carousel $carousel): void
    {
        if (!is_null($carousel->file)) {
            Storage::disk('public')->delete($carousel->file);
        }
    }
}
