<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $mollie;
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->mollie = Mollie::api();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->order;
        $order->total_paid = 10;
        $order->payment_method = 'ideal';
        $order->status = self::STATUS_PENDING;
        $order->save();

//        generate invoice number reuse it on order id

        $payment =  $this->mollie->payments()->create([
            "amount"      => $order->total_price,
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('order.show', $order->id),
            'metadata'    => [
                'order_id' => $order->id,
            ],
            "method" => $order->payment_method,
            "issuer" => $order->payment_method == 'ideal' ? $request->issuer_id : '',
        ]);

        $order->update(['payment_id' => $payment->id]);

        Cart::destroy();

        Mail::send('emails.bedankt', ['order' => $order], function($m) use ($order){
            $m->to($order->email, $order->name)
                ->replyTo('no-reply@hailsuit.com', 'No-Reply')
                ->subject('Bedankt voor uw bestelling!');
        });

        return redirect($payment->getPaymentUrl());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->findOrFail($id);

        $payment =  $this->mollie->payments()->get($order->payment_id);

        if ($payment->isPaid())
        {
            if ($order->status != 'paid'){
                foreach($order->orderItems as $product){
                    $new_stock = (int)$product->property->stock - $product->amount;
                    $this->property->where('id', $product->property_id)
                        ->update(['stock' => $new_stock]);
                }
            }

            $order->status = self::STATUS_COMPLETED;

            Mail::send('emails.payment', ['payment' => $order], function($m) use ($order){
                $m->to($order->email, $order->name)->subject('Betaalbevestiging!');
            });
        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }

        $order->save();

//        return view('cart.order')->with('order', $order)->with('payment', $payment);

        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
