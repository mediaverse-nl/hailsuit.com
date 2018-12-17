<?php

namespace App\Http\Controllers;

use App\Forms\CartStoreForm;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Mollie\Laravel\Facades\Mollie;

class CartController extends Controller
{
    use FormBuilderTrait;

    protected $product;
    protected $formBuilder;
    protected $mollie;

    public function __construct(Product $product, FormBuilder $formBuilder)
    {
        $this->product = $product;
        $this->formBuilder = $formBuilder;
        $this->mollie = Mollie::api();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mollie = $this->mollie->methods()->all();

        return view('cart.index')
            ->with('methods', $mollie)
            ->with('content', Cart::content());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $units = 1)
    {
        $product = $this->product->findOrFail($id);

        $cartArray = [];

        if ($product->images()->count() > 0){
            $cartArray = $cartArray + ['image' => $product->images()->first()];
        }
        $cartArray = $cartArray + ['product' => $product];

//        dd($product->id, $product->titleTranslated(), $units, $product->excludeTax(), $cartArray);
        Cart::add($product->id, $product->titleTranslated(), $units, $product->excludeTax(), $cartArray);

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->formBuilder->create(CartStoreForm::class, [
            'class' => 'form-horizontal',
            'method' => 'POST',
            'url' => route('order.store')
        ]);

        return view('cart.create')
            ->with('content', Cart::content())
            ->with('form', $form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $items = json_decode(json_encode($request->items),true);

        foreach ($items as $item)
        {
            Cart::update($item['id'], $item['qty']);
        }

        return 200;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        if ($id == null){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }

        return redirect()->back();
    }
}
