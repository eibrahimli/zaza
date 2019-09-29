<?php

namespace App\Listeners;

use App\Ayarlar;
use App\Mail\SendContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMailListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $info = $event->info;
        $setting = Ayarlar::where('id', 1)->first();
        Mail::to($setting->email)->send(new SendContactMail($info));
    }
}
