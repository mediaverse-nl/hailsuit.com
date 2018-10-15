<?php

namespace App\Mail;

use App\Order;
use \PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
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
        $pdf = PDF::loadView('pdf.invoice');

        return $this->markdown('emails.order.confirmation');
//            ->attachData($pdf->stream(),'name.pdf', [
//                'mime' => 'application/pdf',
//            ]
//        );
    }
}
