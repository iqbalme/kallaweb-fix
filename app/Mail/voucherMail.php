<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class voucherMail extends Mailable
{
    use Queueable, SerializesModels;
	
	public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($voucher, $event, $peserta_event)
    {
        $this->data['voucher'] = $voucher;
        $this->data['event'] = $event;
        $this->data['peserta_event'] = $peserta_event;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
		if(isset($this->data['voucher'])){
			return new Envelope(
				subject: 'Informasi Pendaftaran Event Anda dan Klaim Voucher Anda!!',
			);
		} else {
			return new Envelope(
				subject: 'Informasi Pendaftaran Event Anda',
			);
		}
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.voucher',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
