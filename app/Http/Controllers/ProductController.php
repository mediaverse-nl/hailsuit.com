<?php

namespace App\Http\Controllers;

use App\AppLanguage;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $appLanguage;

    public function __construct(Product $product, AppLanguage $appLanguage)
    {
        $this->product = $product;
        $this->appLanguage = $appLanguage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->findOrFail($id);
        $appLanguage = $this->appLanguage->findOrFail($id);

        $types = $product->types()->get();

        return view('product.show')
            ->with('product', $product)
            ->with('appLanguage', $appLanguage)
            ->with('types', $types);
    }
}
