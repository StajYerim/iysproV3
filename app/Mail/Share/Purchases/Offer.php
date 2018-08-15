<?php

namespace App\Mail\Share\Purchases;

use App\Model\Purchases\PurchaseOffers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Offer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {



        //Purchase Offers
        $offer = PurchaseOffers::find($this->offer["offer_id"]);
        $lang = $this->offer["lang"];
        //PurchaseOffer/PDF
        $pdf = PDF::loadView('modules.purchases.offers.pdf',compact("offer","lang"))->setPaper('A4');

        //PurchaseOffer Mail Send for Share
        return  $this->from(env("MAIL_FROM_ADDRESS"),account()["name"])->subject($this->offer["thread"])->view('mails.share.offers')->with([
            'thread'=>$this->offer["thread"],
            'content'=>$this->offer["message"]
        ])->attachData($pdf->output(), $this->offer["thread"].'.pdf');


    }
}
