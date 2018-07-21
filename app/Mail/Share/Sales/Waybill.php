<?php

namespace App\Mail\Share\Sales;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Waybill extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($waybill)
    {
        $this->waybill = $waybill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailer = $this->from(env("MAIL_FROM_ADDRESS"),account()["name"]);

        return  $mailer->subject("Yeni İrsaliye Oluşturuldu.")->view('modules.sales.orders.email.waybill')->with([
            'waybill'=>$this->waybill,
        ]);
    }
}
