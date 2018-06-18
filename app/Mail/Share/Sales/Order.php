<?php

namespace App\Mail\Share\Sales;


use App\Model\Sales\SalesOrders;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        //SalesOrder
        $order = SalesOrders::find($this->order["offer_id"]);
        //SalesOrder/PDF
        $pdf = PDF::loadView('modules.sales.orders.pdf',compact("order"))->setPaper('A4');

        //SalesOrder Mail Send for Share
        return  $this->from(env("MAIL_FROM_ADDRESS"),account()["name"])->subject($this->order["thread"])->view('mails.share.orders')->with([
            'thread'=>$this->order["thread"],
            'content'=>$this->order["message"]
        ])->attachData($pdf->output(), $this->order["thread"].'.pdf');


    }
}
