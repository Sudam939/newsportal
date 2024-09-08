<?php

namespace App\Observers;

use App\Mail\RegisterNotification;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

class AdminObserver
{
    /**
     * Handle the Admin "created" event.
     */
    public function created(Admin $admin): void
    {
        $data = [
            "name" => $admin->name,
            "subject" => "Admin Registration",
            "message" => "Welcome to our news portal. Your account has been created successfully. Now you can login with your credentials.",
        ];

        Mail::to($admin->email)->send(new RegisterNotification($data));
    }

    /**
     * Handle the Admin "updated" event.
     */
    public function updated(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "deleted" event.
     */
    public function deleted(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "restored" event.
     */
    public function restored(Admin $admin): void
    {
        //
    }

    /**
     * Handle the Admin "force deleted" event.
     */
    public function forceDeleted(Admin $admin): void
    {
        //
    }
}
