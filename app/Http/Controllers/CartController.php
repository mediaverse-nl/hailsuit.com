<?php

namespace App\Http\Controllers;

use App\Forms\CartStoreForm;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class CartController extends Controller
{
    use FormBuilderTrait;

    protected $product;
    protected $formBuilder;


    public function __construct(Product $product, FormBuilder $formBuilder)
    {
        $this->product = $product;
        $this->formBuilder = $formBuilder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index')
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

        Cart::add($product->id, $product->titleTranslated(), $units, $product->price(), []);

        return redirect()->back();
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
            'method' => 'POST',
            'url' => route('admin.order.store')
        ]);

        return view('cart.create')
            ->with('content', Cart::content())
            ->with('form', $form);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy();

        return redirect()->back();
    }
}
