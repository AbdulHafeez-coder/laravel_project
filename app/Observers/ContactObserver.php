<?php

namespace App\Observers;

use App\Models\Contact;

class ContactObserver
{
    /**
     * Handle the contact "created" event.
     */
    public function saving(contact $contact): void
    {
        if (auth()->check()) {
            $contact->user_id = auth()->id();
        }
    }

    /**
     * Handle the contact "updated" event.
     */
    public function updated(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "deleted" event.
     */
    public function deleted(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "restored" event.
     */
    public function restored(contact $contact): void
    {
        //
    }

    /**
     * Handle the contact "force deleted" event.
     */
    public function forceDeleted(contact $contact): void
    {
        //
    }
}
