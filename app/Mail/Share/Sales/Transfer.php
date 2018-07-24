<?php

namespace App\Mail\Share\Sales;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Transfer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transfer,$order)
    {
        $this->transfer = $transfer;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailer = $this->from(env("MAIL_FROM_ADDRESS"),account()["name"]);

        return  $mailer->subject("Fıstıkçı Gıda Sevkiyat Bilgisi")->view('modules.sales.orders.transfer')->with([
            'transfer_company'=>$this->transfer["transfer_company"],
            'transfer_number'=>$this->transfer["transfer_number"],
            'not'=>$this->transfer["not"],
            'order'=>$this->order,
        ]);



    }
}
