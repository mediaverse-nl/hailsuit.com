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
        $products = $this->product->get();

        return view('product.index')
            ->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $title)
    {
        $product = $this->product->findOrFail($id);

        //        todo fix this error cant load product because stays redirecting page
//        if ($product->titleTranslated() !== str_replace('-', ' ', $title)){
//            return redirect()
//                ->route('product.show', [
//                    $product->id,
//                    str_replace(' ', '-', $product->titleTranslated())
//                ]);
//        }

        $appLanguage = $this->appLanguage->findOrFail($id);

        $types = $product->types()->get();

        return view('product.show')
            ->with('product', $product)
            ->with('appLanguage', $appLanguage)
            ->with('types', $types);
    }
}
