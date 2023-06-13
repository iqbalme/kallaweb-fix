<?php

namespace App\Listeners;

use App\Events\EventRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Traits\CommonTrait;
use App\Mail\voucherMail;

class emailEventRegistered
{
	use CommonTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventRegistered  $event
     * @return void
     */
    public function handle(EventRegistered $event)
    {
	   //dd($event->data['voucher']);
       $this->kirimEmail($event->data['peserta_event']->email, new voucherMail($event->data['voucher'], $event->data['event'], $event->data['peserta_event']));
    }
}
