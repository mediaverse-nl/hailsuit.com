<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Mail\OrderConfirmation;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Mail;
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
    public function store(OrderStoreRequest $request)
    {
        $price = Cart::total();
        $moneyFormat = str_replace( ',', '', $price );

        if( is_numeric( $moneyFormat ) ) {
            $price = $moneyFormat;
        }
        //  the instances of the model order
        $order = $this->order;
        $order->total_paid = $price;
        $order->status = self::STATUS_PENDING;
        $order->email = $request->email;
        $order->name = $request->full_name;
        $order->telephone = $request->phone;
        $order->postal_code = $request->postal_code;
        $order->address_number = $request->house_number;
        $order->address = $request->street;
        $order->city = $request->residence;
        $order->country = $request->country;
        $order->save();
//
        foreach (Cart::content() as $item){
            $order->productOrders()->insert([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'price' => $item->price,
                'amount' => $item->qty,
            ]);
        }

        $payment =  $this->mollie->payments()->create([
            "amount"      => $price, //todo alleen de punt gebruiken
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('order.show', $order->id),
            'metadata'    => [
                'order_id' => $order->id,
            ],
        ]);

        $order->update(['payment_id' => $payment->id]);
//
        Cart::destroy();

        // redirect customer to Mollie checkout page
        return redirect($payment->getPaymentUrl(), 303);
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
//
        $payment =  $this->mollie->payments()->get($order->payment_id);
//
        if ($payment->isPaid())
        {
            if ($order->status != 'paid'){
                foreach($order->productOrders as $product){
                    $product->product()->update([
                        'stock' => ((int)$product->product->stock - $product->amount)
                    ]);
                }

                Mail::to($order->email)->send(new OrderConfirmation($order));
//                dd('stop');
            }

            $order->status = self::STATUS_COMPLETED;
        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }
        $order->payment_method = $payment->method;

        $order->save();

        return view('order.show')
            ->with('order', $order)
            ->with('payment', $payment);
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
