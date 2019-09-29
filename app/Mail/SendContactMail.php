<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $info;

    /**
     * Create a new message instance.
     *
     * @param $info
     */
    public function __construct($request)
    {
        $this->info = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->info['email'])
                    ->subject($this->info['subject'])
                    ->markdown('mail.ContactMail');
    }
}
